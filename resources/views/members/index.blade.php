@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>All Members</h2>
        <a href="{{ route('members.create') }}" class="btn btn-success">+ Add New Member</a>
    </div>

    @if ($members->isEmpty())
        <div class="alert alert-info">No members found.</div>
    @else
        <div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                <tr>
                    <th>S/N</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Current Address</th>
                    <th>Permanent Address</th>
                    <th>Post</th>
                    <th>Union</th>
                    <th>Current Position</th>
                    <th>Previous Position</th>
                    <th>Voter Area</th>
                    <th>NID</th>
                    <th>Religion</th>
                    <th>Occupation</th>
                    <th>Mobile</th>
                    <th>Facebook</th>
                    <th>Education</th>
                    <th>Case No.</th>
                    <th>Has Reason</th>
                    <th>Purpose Statement</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($member->photo_path)
                                <img src="{{ asset('' . $member->photo_path) }}" alt="Photo" width="50" height="50">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->father_name }}</td>
                        <td>{{ $member->mother_name }}</td>
                        <td>{{ $member->current_address }}</td>
                        <td>{{ $member->permanent_address }}</td>
                        <td>{{ $member->permanent_post }}</td>
                        <td>{{ $member->permanent_union }}</td>
                        <td>{{ $member->current_political_position }}</td>
                        <td>{{ $member->previous_political_position }}</td>
                        <td>{{ $member->voter_area_name }}</td>
                        <td>{{ $member->nid_number }}</td>
                        <td>{{ $member->religion }}</td>
                        <td>{{ $member->occupation }}</td>
                        <td>{{ $member->mobile }}</td>
                        <td>{{ $member->facebook_id }}</td>
                        <td>{{ $member->education }}</td>
                        <td>{{ $member->case_number }}</td>
                        <td>
                            @if($member->is_reason)
                                ✅
                            @else
                                ❌
                            @endif
                        </td>
                        <td>{{ $member->purpose_statement }}</td>
                        <td>
                            <a href="{{ route('members.show', $member) }}" class="btn btn-sm btn-info mb-1" title="View">
                                👁️
                            </a>
                            <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-warning mb-1" title="Edit">
                                ✏️
                            </a>
                            <form action="{{ route('members.destroy', $member) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger" title="Delete">
                                    🗑️
                                </button>
                            </form>
                            <form action="{{ route('download.pdf') }}" method="GET">
                                @csrf
                                <button type="submit" onclick="return confirm('Do you want to Download?')" class="btn btn-sm btn-danger" title="Delete">
                                    📂
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
