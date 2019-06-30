@extends('base')


@section('title')
Band Details
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

<div class="row">
    <div class="col-sm-8">

        @if (isset($details->id))
        <form method="POST" action="/band/{{ $details->id }}">
        @else
        <form method="POST" action="/band">
        @endif
            @csrf
            <div class="form-group">
                <label for="name">Band Name *</label>
                <input type="text" value="{{ old('name', $details->name) }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Enter Band Name" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" value="{{ old('start_date', $details->start_date) }}" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" name="start_date" placeholder="Enter Start Date">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" value="{{ old('website', $details->website) }}" class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" name="website" placeholder="Eg. http://www.some-website.com">
            </div>
            <div class="form-group">
                <label for="still_active">Active</label>{{ old('recorded_date', $details->recorded_date) }}
                <select name="still_active" class="form-control" required>
                    <option value="0">No</option>
                    <option value="1" @if (in_array(1, [old('still_active'), $details->still_active])) {{ 'selected' }} @endif>Yes</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-sm-4">
        Albums
        <div class="card card-body bg-light">
            <ul class="list-unstyled">
            @foreach($details->albums as $album)
                <li>{{ $loop->iteration }}) {{ $album->name }}</li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection