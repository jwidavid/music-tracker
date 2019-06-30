@extends('base')


@section('title')
Albums
@endsection


@section('footerContent')
<script src="/js/sorting.js"></script>
@endsection


@section('pageHeading')
Quickly find the music that you're in the mood for from my personal library.
@endsection


@section('content_main')
<div id="table" class="table-editable">
    <div class="table-add float-left">
        <label for="bandFilter"><b>Filter by Band</b></label>
        <select id="bandFilter">
            <option></option>
            @foreach($bands as $band)
                <option>{{ $band['name'] }}</option>
            @endforeach
        </select>
    </div>
    <span class="table-add float-right mb-3 mr-2"><a href="/album" class="btn btn-success btn-rounded btn-sm my-0">Create New</a></span>
    <table id="sortable" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
        <tr>
            <th>Album</th>
            <th>Tracks</th>
            <th class="d-none">Band</th>
            <th>Release Date</th>
            <th>Label</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td>{{ $album['name'] }}</td>
                <td>{{ $album['number_of_tracks'] }}</td>
                <td class="d-none">{{ $album->band->name }}</td>
                <td>{{ $album->release_date }}</td>
                <td>{{ $album->label }}</td>
                <td>{{ $album['genre'] }}</td>
                <td>
                    <span class="table-remove">
                        <a href="/album/{{ $album->id }}" class="btn btn-info btn-rounded btn-sm my-0">Edit</a>
                        <form method="post" action="/album/{{ $album->id }}/delete" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0">Delete</button>
                        </form>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
