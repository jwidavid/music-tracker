@extends('base')

@section('title')
Albums
@endsection

@section('headerContent')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endsection

@section('content_main')
<div class="container">
    <div id="table" class="table-editable">
        <div class="table-add float-left">
            <label for="testing"><b>Filter by Band</b></label>
            <select id="testing">
                @foreach($bands as $band)
                    <option>{{ $band['name'] }}</option>
                @endforeach
            </select>
        </div>
        <span class="table-add float-right mb-3 mr-2"><a href="#" class="btn btn-success btn-rounded btn-sm my-0">Create New</a></span>
        <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
            <tr>
                <th class="text-center">Album</th>
                <th class="text-center">Tracks</th>
                <th class="text-center">Band</th>
                <th class="text-center">Genre</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($albums as $album)
                <tr>
                    <td>{{ $album['name'] }}</td>
                    <td>{{ $album['number_of_tracks'] }}</td>
                    <td>{{ $album->band->name }}</td>
                    <td>{{ $album['genre'] }}</td>
                    <td>
                        <span class="table-remove">
                            <button type="button" class="btn btn-info btn-rounded btn-sm my-0">Edit</button>
                            <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Delete</button>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
