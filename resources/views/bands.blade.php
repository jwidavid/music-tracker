@extends('base')

@section('title')
Bands
@endsection

@section('content_main')
<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Music Tracker @yield('title')</h1>
    <p class="lead">Quickly find the music that you're in the mood for from my personal library.</p>
</div>

<div class="container">
    <span class="table-add float-right mb-3 mr-2"><a href="#" class="btn btn-success btn-rounded btn-sm my-0">Create New</a></span>
    <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
        <tr>
            <th class="text-center">Band</th>
            <th class="text-center">Albums</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($bands as $band)
            <tr>
                <td contenteditable="true">{{ $band['name'] }}</td>
                <td contenteditable="true">{{ $band['albums'] }}</td>
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
@endsection
