@extends('layouts.app') {{-- Make sure you have a layout or replace with basic HTML --}}

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h2>Create New Member</h2>
            <a href="{{ route('members.index') }}" class="btn btn-success">Member List</a>
        </div>

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

        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
{{--            @auth--}}
{{--                @if(auth()->user()->isAdmin())--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="user_id">Select User</label>--}}
{{--                        <select name="user_id" id="user_id" class="form-control" required>--}}
{{--                            @foreach($users as $user)--}}
{{--                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->mobile }})</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endauth--}}

            <div class="form-group">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="father_name" class="form-control">
            </div>

            <div class="form-group">
                <label>Mother's Name</label>
                <input type="text" name="mother_name" class="form-control">
            </div>

            <div class="form-group">
                <label>Current Address</label>
                <textarea name="current_address" class="form-control" rows="2"></textarea>
            </div>

            <div class="form-group">
                <label>Permanent Address</label>
                <textarea name="permanent_address" class="form-control" rows="2"></textarea>
            </div>

            <div class="form-group">
                <label>Permanent Post</label>
                <input type="text" name="permanent_post" class="form-control">
            </div>

            <div class="form-group">
                <label>Permanent Union</label>
                <input type="text" name="permanent_union" class="form-control">
            </div>

            <div class="form-group">
                <label>Current Political Position</label>
                <input type="text" name="current_political_position" class="form-control">
            </div>

            <div class="form-group">
                <label>Previous Political Position</label>
                <input type="text" name="previous_political_position" class="form-control">
            </div>

            <div class="form-group">
                <label>Voter Area Name</label>
                <input type="text" name="voter_area_name" class="form-control">
            </div>

            <div class="form-group">
                <label>NID Number</label>
                <input type="text" name="nid_number" class="form-control">
            </div>

            <div class="form-group">
                <label>Religion</label>
                <input type="text" name="religion" class="form-control">
            </div>

            <div class="form-group">
                <label>Occupation</label>
                <input type="text" name="occupation" class="form-control">
            </div>

            <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control">
            </div>

            <div class="form-group">
                <label>Facebook ID</label>
                <input type="text" name="facebook_id" class="form-control">
            </div>

            <div class="form-group">
                <label>Education</label>
                <input type="text" name="education" class="form-control">
            </div>

            <div class="form-group">
                <label>Case Number</label>
                <input type="text" name="case_number" class="form-control">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" name="is_reason" class="form-check-input" id="is_reason">
                <label class="form-check-label" for="is_reason">Is there a reason?</label>
            </div>

            <div class="form-group">
                <label>Purpose Statement</label>
                <textarea name="purpose_statement" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Save Member</button>
        </form>
    </div>
@endsection
