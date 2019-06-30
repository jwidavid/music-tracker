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

@if (isset($details->id))
<form method="POST" action="/album/{{ $details->id }}">
@else
<form method="POST" action="/album">
@endif
    @csrf
    <div class="form-group">
        <label for="name">Album Name *</label>
        <input type="text" value="{{ $details->name }}" class="form-control" name="name" placeholder="Enter Album Name" required>
    </div>
    <div class="form-group">
        <label for="band_id">Band *</label>
        <select name="band_id" class="form-control" required>
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
        <label for="recorded_date">Date Recorded</label>
        <input type="date" value="{{ $details->recorded_date }}" class="form-control" name="recorded_date" placeholder="Enter Date Recorded">
    </div>
    <div class="form-group">
        <label for="release_date">Date Released</label>
        <input type="date" value="{{ $details->release_date }}" class="form-control" name="release_date" placeholder="Enter Date Released">
    </div>
    <div class="form-group">
        <label for="number_of_tracks">Number of Tracks</label>
        <input type="number" value="{{ $details->number_of_tracks }}" class="form-control" name="number_of_tracks" placeholder="Enter Number of Tracks">
    </div>
    <div class="form-group">
        <label for="abel">Label Company</label>
        <input type="text" value="{{ $details->label }}" class="form-control" name="label" placeholder="Enter Label Company">
    </div>
    <div class="form-group">
        <label for="producer">Producer</label>
        <input type="text" value="{{ $details->producer }}" class="form-control" name="producer" placeholder="Enter Producer Name">
    </div>
    <div class="form-group">
        <label for="genre">Genre</label>
        <input type="text" value="{{ $details->genre }}" class="form-control" name="genre" placeholder="Enter the Genre">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection