@extends('base')


@section('title')
    @if (isset($details->name))
        Album Details
    @else
        Create New Album
    @endif
@endsection


@section('pageHeading')
    @if (isset($details->name))
        {{ $details->name }} <small>[by {{ $details->band->name }}]</small>
    @endif
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
<form method="POST" action="/album/{{ $id }}">
@else
<form method="POST" action="/album">
@endif

    @csrf

    <div class="form-group">
        <label for="album_name">Album Name *</label>
        <input type="text" value="{{ $details->name }}" class="form-control" id="album_name" name="name" placeholder="Enter Album Name" required>
    </div>
    <div class="form-group">
        <label for="band">Band *</label>
        <select id="band" name="band_id" class="form-control" required>
            <option value="" disabled selected hidden>Choose from bands</option>
            @foreach($bands as $band)
                @if ($band->id === $details->band_id)
                <option value="{{ $band->id }}" selected>{{ $band->name }}</option>
                @endif
                <option value="{{ $band->id }}">{{ $band->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="album_date_recorded">Date Recorded</label>
        <input type="date" value="{{ $details->recorded_date }}" class="form-control" id="album_date" name="recorded_date" placeholder="Enter Date Recorded">
    </div>
    <div class="form-group">
        <label for="album_date_released">Date Released</label>
        <input type="date" value="{{ $details->release_date }}" class="form-control" id="album_date_released" name="release_date" placeholder="Enter Date Released">
    </div>
    <div class="form-group">
        <label for="album_tracks">Number of Tracks</label>
        <input type="number" value="{{ $details->number_of_tracks }}" class="form-control" id="album_tracks" name="number_of_tracks" placeholder="Enter Number of Tracks">
    </div>
    <div class="form-group">
        <label for="album_label">Label Company</label>
        <input type="text" value="{{ $details->label }}" class="form-control" id="album_label" name="label" placeholder="Enter Label Company">
    </div>
    <div class="form-group">
        <label for="album_producer">Producer</label>
        <input type="text" value="{{ $details->producer }}" class="form-control" id="album_producer" name="producer" placeholder="Enter Producer Name">
    </div>
    <div class="form-group">
        <label for="album_genre">Genre</label>
        <input type="text" value="{{ $details->genre }}" class="form-control" id="album_genre" name="genre" placeholder="Enter the Genre">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection