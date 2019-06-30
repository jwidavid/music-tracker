@extends('base')


@section('title')
Bands
@endsection


@section('footerContent')
<script src="/js/sorting.js"></script>
@endsection


@section('pageHeading')
Quickly find the music that you're in the mood for from my personal library.
@endsection


@section('content_main')
<span class="table-add float-right mb-3 mr-2"><a href="/band" class="btn btn-success btn-rounded btn-sm my-0">Create New</a></span>
<table id="sortable" class="table table-bordered table-responsive-md table-striped text-center">
    <thead>
    <tr>
        <th>Band</th>
        <th>Started</th>
        <th>Website</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        @foreach($bands as $band)
        <tr>
            <td>{{ $band['name'] }}</td>
            <td style="min-width:120px;">{{ $band['start_date'] }}</td>
            <td>{{ $band['website'] }}</td>
            <td>{{ $band['still_active'] ? 'Yes' : 'No' }}</td>
            <td style="min-width:150px;">
                <span class="table-remove">
                    <a href="/band/{{ $band->id }}" class="btn btn-info btn-rounded btn-sm my-0">Edit</a>
                    <form method="post" action="/band/{{ $band->id }}/delete" class="d-inline">
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
@endsection
