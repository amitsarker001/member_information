@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Member Details</h2>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span>{{ $member->name }}</span>
                <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-light"> ✏ Edit</a>
            </div>
            <div class="card-body row">
                <div class="col-md-3 text-center mb-3">
                    @if($member->photo_path)
                        <img src="{{ asset('' . $member->photo_path) }}" alt="Photo" class="img-thumbnail" width="150">
                    @else
                        <div class="text-muted">No photo uploaded</div>
                    @endif
                </div>
                <div class="col-md-9">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Father's Name:</strong> {{ $member->father_name }}</li>
                        <li class="list-group-item"><strong>Mother's Name:</strong> {{ $member->mother_name }}</li>
                        <li class="list-group-item"><strong>Current Address:</strong> {{ $member->current_address }}</li>
                        <li class="list-group-item"><strong>Permanent Address:</strong> {{ $member->permanent_address }}</li>
                        <li class="list-group-item"><strong>Post:</strong> {{ $member->permanent_post }}</li>
                        <li class="list-group-item"><strong>Union:</strong> {{ $member->permanent_union }}</li>
                        <li class="list-group-item"><strong>Current Political Position:</strong> {{ $member->current_political_position }}</li>
                        <li class="list-group-item"><strong>Previous Political Position:</strong> {{ $member->previous_political_position }}</li>
                        <li class="list-group-item"><strong>Voter Area:</strong> {{ $member->voter_area_name }}</li>
                        <li class="list-group-item"><strong>NID:</strong> {{ $member->nid_number }}</li>
                        <li class="list-group-item"><strong>Religion:</strong> {{ $member->religion }}</li>
                        <li class="list-group-item"><strong>Occupation:</strong> {{ $member->occupation }}</li>
                        <li class="list-group-item"><strong>Mobile:</strong> {{ $member->mobile }}</li>
                        <li class="list-group-item"><strong>Facebook:</strong> {{ $member->facebook_id }}</li>
                        <li class="list-group-item"><strong>Education:</strong> {{ $member->education }}</li>
                        <li class="list-group-item"><strong>Case Number:</strong> {{ $member->case_number }}</li>
                        <li class="list-group-item"><strong>Has Reason:</strong> {{ $member->is_reason ? 'Yes' : 'No' }}</li>
                        <li class="list-group-item"><strong>Purpose Statement:</strong> {{ $member->purpose_statement }}</li>
                    </ul>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('members.index') }}" class="btn btn-secondary">↩ Back to List</a>
            </div>
        </div>
    </div>
@endsection
