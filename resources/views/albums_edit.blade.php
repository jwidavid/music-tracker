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

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
    {{ $errors->first() }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (isset($details->id))
<form method="POST" action="/album/{{ $details->id }}">
@else
<form method="POST" action="/album">
@endif
    @csrf
    <div class="form-group">
        <label for="name">Album Name *</label>
        <input type="text" value="{{ old('name', $details->name) }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Enter Album Name" required maxlength="255">
    </div>
    <div class="form-group">
        <label for="band_id">Band *</label>
        <select name="band_id" class="form-control {{ $errors->has('band_id') ? 'is-invalid' : '' }}" required>
            <option value="" disabled selected hidden>Choose from bands</option>
            @foreach($bands as $band)
                @if (in_array($band->id, [old('band_id'), $details->band_id]))
                <option value="{{ $band->id }}" selected>{{ $band->name }}</option>
                @else
                <option value="{{ $band->id }}">{{ $band->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="recorded_date">Recorded Date</label>
        <input type="date" value="{{ old('recorded_date', $details->recorded_date) }}" class="form-control {{ $errors->has('recorded_date') ? 'is-invalid' : '' }}" name="recorded_date" placeholder="Enter Date Recorded">
    </div>
    <div class="form-group">
        <label for="release_date">Released Date</label>
        <input type="date" value="{{ old('release_date', $details->release_date) }}" class="form-control {{ $errors->has('release_date') ? 'is-invalid' : '' }}" name="release_date" placeholder="Enter Date Released">
    </div>
    <div class="form-group">
        <label for="number_of_tracks">Number of Tracks</label>
        <input type="number" value="{{ old('number_of_tracks', $details->number_of_tracks) }}" class="form-control {{ $errors->has('number_of_tracks') ? 'is-invalid' : '' }}" name="number_of_tracks" placeholder="Enter Number of Tracks" max="50">
    </div>
    <div class="form-group">
        <label for="label">Label</label>
        <input type="text" value="{{ old('label', $details->label) }}" class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}" name="label" placeholder="Enter Label" maxlength="32">
    </div>
    <div class="form-group">
        <label for="producer">Producer</label>
        <input type="text" value="{{ old('producer', $details->producer) }}" class="form-control {{ $errors->has('producer') ? 'is-invalid' : '' }}" name="producer" placeholder="Enter Producer Name" maxlength="32">
    </div>
    <div class="form-group">
        <label for="genre">Genre</label>
        <input type="text" value="{{ old('genre', $details->genre) }}" class="form-control {{ $errors->has('genre') ? 'is-invalid' : '' }}" name="genre" placeholder="Enter the Genre" maxlength="21">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection