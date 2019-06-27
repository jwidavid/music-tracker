@extends('base')


@section('title')
Bands
@endsection


@section('pageHeading')
Quickly find the music that you're in the mood for from my personal library.
@endsection


@section('content_main')
<div class="container">
    <span class="table-add float-right mb-3 mr-2"><a href="/band" class="btn btn-success btn-rounded btn-sm my-0">Create New</a></span>
    <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
        <tr>
            <th class="text-center">Band</th>
            <th class="text-center">Started</th>
            <th class="text-center">Website</th>
            <th class="text-center">Active</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($bands as $band)
            <tr>
                <td contenteditable="true">{{ $band['name'] }}</td>
                <td contenteditable="true">{{ $band['start_date'] }}</td>
                <td contenteditable="true">{{ $band['website'] }}</td>
                <td contenteditable="true">{{ $band['still_active'] ? 'Yes' : 'No' }}</td>
                <td>
                    <span class="table-remove">
                        <a href="/band/{{ $band->id }}" class="btn btn-info btn-rounded btn-sm my-0">Edit</a>
                        <a href="" class="btn btn-danger btn-rounded btn-sm my-0">Delete</a>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
