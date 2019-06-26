@extends('base')

@section('title')
Bands
@endsection

@section('content_main')
<div class="container">
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
