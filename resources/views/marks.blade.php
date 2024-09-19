@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success_message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success_message') }}
    </div>
    @endif
    <h1 class="my-4">Marks Table</h1>
    <div style="float: right"><a href="{{route("add.get.marks")}}" class="btn btn-primary">Add Marks</a></div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Remarks</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
                <tr>
                    <td>{{ $mark->name }}</td>
                    <td>{{ $mark->subject }}</td>
                    <td>{{ $mark->marks }}</td>
                    <td>{{ $mark->remarks }}</td>
                    <td>{{ $mark->created_at }}</td>
                    <td>
                        <a href="/marks/edit/{{$mark->id}}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="/marks/delete/{{$mark->id}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
