@extends('master')
@section('title') Participant @endsection
@section('page-title') Participant Basic Edit Form @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Participant Basic Edit  @endsection

@section('content')
    <form action="{{ route('participant-basic-info-update') }}" method="POSt" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Name</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" name="name" value="{{ $ep->participant->name }}" class="form-control" id="editName">
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">School</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" name="school" value="{{ $ep->participant->school }}" class="form-control" id="editName">
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Division</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" name="division" value="{{ $ep->division->name }}" class="form-control bg-white" id="editName" readonly>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editCode" class="col-md-2 col-sm-3 col-form-label">District</label>
            <div class="col-md-10 col-sm-9">
                <select class="form-control" name="district_id" required>
                    @foreach($ep->division->districts as $district)
                        <option value="{{ $district->id }}" {{ $ep->participant->district_id == $district->id ? 'selected':'' }}>{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Category</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" name="category" value="{{ $ep->category->name }}" class="form-control" id="editName" readonly>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Class</label>
            <div class="col-md-10 col-sm-9">
                <select class="form-control" name="class_id" required>
                    @foreach($ep->category->classes as $class)
                        <option value="{{ $class->id }}" {{ $ep->participant->class_id == $class->id ? 'selected':'' }}>{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Email</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" name="email" value="{{ $ep->participant->email }}" class="form-control" id="editName">
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Mobile</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" name="mobile" value="{{ $ep->participant->mobile }}" class="form-control" id="editName">
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Gender</label>
            <div class="col-md-10 col-sm-9">
                <select class="form-control" name="gender" required>
                    <option value="Male" {{ $ep->participant->gender == 'Male' ? 'selected':'' }}>Male</option>
                    <option value="Female" {{ $ep->participant->gender == 'Female' ? 'selected':'' }}>Female</option>
                    <option value="Other" {{ $ep->participant->gender == 'Other' ? 'selected':'' }}>Other</option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Post Code</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" name="post_code" value="{{ $ep->participant->post_code }}" class="form-control" id="editName">
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Photo</label>
            <div class="col-md-10 col-sm-9">
                <input type="file" name="avatar" value="" class="form-control" id="editName">
                <div class="p-1 bg-white">
                    <img class="img-thumbnail" style="width: 100px" src="{{ asset($ep->participant->avatar) }}" alt="">
                </div>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label">Address</label>
            <div class="col-md-10 col-sm-9">
                <textarea name="address" class="form-control">{{ $ep->participant->address }}</textarea>
            </div>
        </div>

        <input type="hidden" name="event_participant_id" value="{{ $ep->id }}"/>
        <input type="hidden" name="participant_id" value="{{ $ep->participant_id }}"/>

        <div class="form-group row mb-2">
            <label for="editName" class="col-md-2 col-sm-3 col-form-label"></label>
            <div class="col-md-10 col-sm-9">
                <button type="submit" class="btn btn-sm btn-success btn-block">Update</button>
            </div>
        </div>
    </form>
@endsection

@section('custom-script')
    @include('participants.edit.includes.script')
@endsection


