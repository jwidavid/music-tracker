@extends('base')


@section('title')
Albums
@endsection


@section('headerContent')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection


@section('footerContent')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/albums.js"></script>
@endsection


@section('pageHeading')
Quickly find the music that you're in the mood for from my personal library.
@endsection


@section('content_main')
<div class="container">
    <div class="table-add float-left">
        <label for="bandNames"><b>Filter by Band</b></label>
        <select id="bandNames">
            <option></option>
            @foreach($bands as $band)
                <option>{{ $band['name'] }}</option>
            @endforeach
        </select>
    </div>
    <span class="table-add float-right mb-3 mr-2"><a href="/album" class="btn btn-success btn-rounded btn-sm my-0">Create New</a></span>
    <table id="tableAlbums" class="display table table-bordered table-responsive-md table-striped text-center" style="width:100%">
        <thead>
            <tr>
                <th>Album</th>
                <th>Tracks</th>
                <th>Band</th>
                <th>Genre</th>
                <th>Actions</th>
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
                        <a href="/album/{{ $album->id }}" class="btn btn-info btn-rounded btn-sm my-0">Edit</a>
                        <a href="" class="btn btn-danger btn-rounded btn-sm my-0">Delete</a>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
