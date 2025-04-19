<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Mpdf\Mpdf;



class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized.');
        }
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create1()
    {
        if (!auth()->user()->isAdmin() && auth()->user()->member) {
            return redirect()->route('members.myinfo')->with('warning', 'You already created your info.');
        }
        return view('members.create');
    }

    public function create()
    {
        $user = auth()->user();

        if ($user->isOther() && $user->member) {
            return redirect()->route('members.show', $user->member->id)
                ->with('info', 'You already created your information. You can update it.');
        }
        $users = auth()->user()->isAdmin() ? \App\Models\User::all() : null;
        if (!empty($user->member)) {
            return redirect()->route('members.show', $user->member->id)
                ->with('info', 'You already created your information. You can update it.');
        } else {
            return view('members.create', compact('users'));
        }
    }


    public function store1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'current_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'permanent_post' => 'nullable|string|max:255',
            'permanent_union' => 'nullable|string|max:255',
            'current_political_position' => 'nullable|string|max:255',
            'previous_political_position' => 'nullable|string|max:255',
            'voter_area_name' => 'nullable|string|max:255',
            'nid_number' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'facebook_id' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'case_number' => 'nullable|string|max:255',
            'is_reason' => 'nullable|boolean',
            'purpose_statement' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo_path'] = $photoPath;
        }

        $validatedData['is_reason'] = $request->has('is_reason'); // Checkbox handling
        $validatedData['user_id'] = auth()->id();
        Member::create($validatedData);

        return redirect()->route('members.index')->with('success', 'Member has been created successfully.');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->isOther() && $user->member) {
            return redirect()->route('members.edit', $user->member->id)
                ->with('warning', 'You already submitted your member information.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'current_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'permanent_post' => 'nullable|string|max:255',
            'permanent_union' => 'nullable|string|max:255',
            'current_political_position' => 'nullable|string|max:255',
            'previous_political_position' => 'nullable|string|max:255',
            'voter_area_name' => 'nullable|string|max:255',
            'nid_number' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'facebook_id' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'case_number' => 'nullable|string|max:255',
            'is_reason' => 'nullable|boolean',
            'purpose_statement' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            // If admin, allow setting user_id from form input
            //'user_id' => $user->isAdmin() ? 'required|exists:users,id' : '',
        ]);

        // Handle image upload if needed
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('assets/images/members');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $imageName);
            $validatedData['photo_path'] = 'assets/images/members/' . $imageName;
        }

        $validatedData['is_reason'] = $request->has('is_reason');

        // Always attach logged-in user as owner
        $validatedData['user_id'] = auth()->id();
        // For "others", override user_id with their own ID
//        if ($user->isOther()) {
//            $validatedData['user_id'] = $user->id;
//        }

        Member::create($validatedData);

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function show(Member $member)
    {
        $user = auth()->user();

        // If user is "others" and trying to access someone else's member info
        if ($user->isOther() && $member->user_id !== $user->id) {
            abort(403, 'Unauthorized access.');
        }
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        $user = auth()->user();

        if ($user->isOther() && $member->user_id !== $user->id) {
            abort(403, 'Unauthorized.');
        }

        return view('members.edit', compact('member'));
    }

    public function update1(Request $request, Member $member)
    {
        if (!auth()->user()->isAdmin() && $member->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'current_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'permanent_post' => 'nullable|string',
            'permanent_union' => 'nullable|string',
            'current_political_position' => 'nullable|string',
            'previous_political_position' => 'nullable|string',
            'voter_area_name' => 'nullable|string',
            'nid_number' => 'nullable|string|max:30',
            'religion' => 'nullable|string',
            'occupation' => 'nullable|string',
            'mobile' => 'nullable|string|max:20',
            'facebook_id' => 'nullable|string',
            'education' => 'nullable|string',
            'case_number' => 'nullable|string',
            'is_reason' => 'nullable|boolean',
            'purpose_statement' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Update boolean field explicitly
        $validated['is_reason'] = $request->has('is_reason');

        // Handle file upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('assets/images/members');

            // Create directory if it doesn't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Delete old file if exists
            if ($member->photo_path && file_exists(public_path($member->photo_path))) {
                unlink(public_path($member->photo_path));
            }

            // Move uploaded file
            $image->move($destinationPath, $imageName);

            // Save relative path
            $validated['photo_path'] = 'assets/images/members/' . $imageName;
        }

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function update(Request $request, Member $member)
    {
        $user = auth()->user();

        if ($user->isOther() && $member->user_id !== $user->id) {
            abort(403, 'Unauthorized.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'current_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'permanent_post' => 'nullable|string',
            'permanent_union' => 'nullable|string',
            'current_political_position' => 'nullable|string',
            'previous_political_position' => 'nullable|string',
            'voter_area_name' => 'nullable|string',
            'nid_number' => 'nullable|string|max:30',
            'religion' => 'nullable|string',
            'occupation' => 'nullable|string',
            'mobile' => 'nullable|string|max:20',
            'facebook_id' => 'nullable|string',
            'education' => 'nullable|string',
            'case_number' => 'nullable|string',
            'is_reason' => 'nullable|boolean',
            'purpose_statement' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $validated['is_reason'] = $request->has('is_reason');

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('assets/images/members');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            if ($member->photo_path && file_exists(public_path($member->photo_path))) {
                unlink(public_path($member->photo_path));
            }
            $image->move($destinationPath, $imageName);
            $validated['photo_path'] = 'assets/images/members/' . $imageName;
        }

        $member->update($validated);

        if ($user->isOther() && $user->member) {
            return redirect()->route('members.show', $user->member->id)
                ->with('success', 'Member updated successfully.');
        }
        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized.');
        }
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted.');
    }

    public function myInfo()
    {
        $member = auth()->user()->member;

        if (!$member) {
            return redirect()->route('members.create');
        }

        return view('members.show', compact('member'));
    }

    public function downloadPDF1()
    {
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'fontDir' => array_merge($fontDirs, [
                resource_path('fonts'),
            ]),
            'fontdata' => $fontData + [
                    'solaiman_lipi' => [ // must be lowercase and snake_case
                        'R' => 'SolaimanLipi_Bold_10-03-12.ttf',    // regular font,
                        'B' => 'SolaimanLipi_Bold_10-03-12.ttf',    // bold font,
                        'useOTL' => 0xFF,
                        'useKashida' => 75
                    ]
                ],
            'default_font' => 'solaiman_lipi'
        ]);

        $banglaText = 'এই একটি বাংলা ডকুমেন্ট, যা mPDF ব্যবহার করে তৈরি করা হয়েছে।';

        $mpdf->WriteHTML("<h1 style='font-family: siyamrupali;'>$banglaText</h1>");
        $mpdf->Output('bangla-document.pdf', 'D'); // D = Download
    }

    public function downloadPDF()
    {
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'fontDir' => array_merge($fontDirs, [
                resource_path('fonts'),
            ]),
            'fontdata' => $fontData + [
                    'solaiman_lipi' => [
                        'R' => 'SolaimanLipi_Bold_10-03-12.ttf',
                        'useOTL' => 0xFF,
                        'useKashida' => 75,
                    ]
                ],
            'default_font' => 'solaiman_lipi'
        ]);

        $html = view('pdf_template')->render();

        $mpdf->WriteHTML($html);
        return $mpdf->Output('form.pdf', 'D');
    }




}

