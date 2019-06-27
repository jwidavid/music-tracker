@extends('base')


@section('title')
Bands
@endsection 


@section('headerContent')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection


@section('footerContent')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/bands.js"></script>
@endsection


@section('pageHeading')
Quickly find the music that you're in the mood for from my personal library.
@endsection


@section('content_main')
<div class="container">
    <span class="table-add float-right mb-3 mr-2"><a href="/band" class="btn btn-success btn-rounded btn-sm my-0">Create New</a></span>
    <table id="tableBands" class="display table table-bordered table-responsive-md table-striped text-center" style="width:100%">
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
                <td>{{ $band['start_date'] }}</td>
                <td>{{ $band['website'] }}</td>
                <td>{{ $band['still_active'] ? 'Yes' : 'No' }}</td>
                <td>
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
</div>
@endsection
