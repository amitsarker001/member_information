@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Member: {{ $member->name }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Please fix the following errors:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('members.update', $member) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" required>
            </div>

            <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="father_name" class="form-control" value="{{ old('father_name', $member->father_name) }}">
            </div>

            <div class="form-group">
                <label>Mother's Name</label>
                <input type="text" name="mother_name" class="form-control" value="{{ old('mother_name', $member->mother_name) }}">
            </div>

            <div class="form-group">
                <label>Current Address</label>
                <textarea name="current_address" class="form-control">{{ old('current_address', $member->current_address) }}</textarea>
            </div>

            <div class="form-group">
                <label>Permanent Address</label>
                <textarea name="permanent_address" class="form-control">{{ old('permanent_address', $member->permanent_address) }}</textarea>
            </div>

            <div class="form-group">
                <label>Permanent Post</label>
                <input type="text" name="permanent_post" class="form-control" value="{{ old('permanent_post', $member->permanent_post) }}">
            </div>

            <div class="form-group">
                <label>Permanent Union</label>
                <input type="text" name="permanent_union" class="form-control" value="{{ old('permanent_union', $member->permanent_union) }}">
            </div>

            <div class="form-group">
                <label>Current Political Position</label>
                <input type="text" name="current_political_position" class="form-control" value="{{ old('current_political_position', $member->current_political_position) }}">
            </div>

            <div class="form-group">
                <label>Previous Political Position</label>
                <input type="text" name="previous_political_position" class="form-control" value="{{ old('previous_political_position', $member->previous_political_position) }}">
            </div>

            <div class="form-group">
                <label>Voter Area Name</label>
                <input type="text" name="voter_area_name" class="form-control" value="{{ old('voter_area_name', $member->voter_area_name) }}">
            </div>

            <div class="form-group">
                <label>NID Number</label>
                <input type="text" name="nid_number" class="form-control" value="{{ old('nid_number', $member->nid_number) }}">
            </div>

            <div class="form-group">
                <label>Religion</label>
                <input type="text" name="religion" class="form-control" value="{{ old('religion', $member->religion) }}">
            </div>

            <div class="form-group">
                <label>Occupation</label>
                <input type="text" name="occupation" class="form-control" value="{{ old('occupation', $member->occupation) }}">
            </div>

            <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $member->mobile) }}">
            </div>

            <div class="form-group">
                <label>Facebook ID</label>
                <input type="text" name="facebook_id" class="form-control" value="{{ old('facebook_id', $member->facebook_id) }}">
            </div>

            <div class="form-group">
                <label>Education</label>
                <input type="text" name="education" class="form-control" value="{{ old('education', $member->education) }}">
            </div>

            <div class="form-group">
                <label>Case Number</label>
                <input type="text" name="case_number" class="form-control" value="{{ old('case_number', $member->case_number) }}">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" name="is_reason" class="form-check-input" id="is_reason"
                    {{ old('is_reason', $member->is_reason) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_reason">Is there a reason?</label>
            </div>

            <div class="form-group">
                <label>Purpose Statement</label>
                <textarea name="purpose_statement" class="form-control">{{ old('purpose_statement', $member->purpose_statement) }}</textarea>
            </div>

            <div class="form-group">
                <label>Photo (Leave blank to keep current)</label>
                <input type="file" name="photo" class="form-control-file">
                @if ($member->photo_path)
                    <div class="mt-2">
                        <img src="{{ asset('' . $member->photo_path) }}" alt="Photo" width="100">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Member</button>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
