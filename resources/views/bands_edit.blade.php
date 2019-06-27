@extends('base')


@section('title')
Band Details
@endsection


@section('content_main')

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>I'll Be Hog Wallered...</strong> {{ session('error') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (isset($id))
<form method="POST" action="/band/{{ $id }}">
@else
<form method="POST" action="/band">
@endif

    @csrf

    <div class="form-group">
        <label for="band_name">Band Name *</label>
        <input type="text" value="{{ $details->name }}" class="form-control" id="band_name" name="name" placeholder="Enter Band Name" required>
    </div>
    <div class="form-group">
        <label for="band_date_start">Start Date</label>
        <input type="date" value="{{ $details->start_date }}" class="form-control" id="band_date_start" name="start_date" placeholder="Enter Start Date">
    </div>
    <div class="form-group">
        <label for="band_website">Website</label>
        <input type="url" value="{{ $details->website }}" class="form-control" id="band_website" name="website" placeholder="Eg. http://www.some-website.com">
    </div>
    <div class="form-group">
        <label for="band_active">Active</label>
        <select id="band_active" name="still_active" class="form-control" required>
            <option value="0" @if ($details->still_active == '0') {{ 'selected' }} @endif>No</option>
            <option value="1" @if ($details->still_active == '1') {{ 'selected' }} @endif>Yes</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection