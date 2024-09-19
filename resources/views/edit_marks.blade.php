@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Update Marks</h1>
    <form method="post" action="/marks/edit/{{$marks->id}}">
        {{-- CSRF: Cross Site Forgery Request --}}
        @csrf
        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" class="form-control" name="student_name" placeholder="Enter student name" value="{{$marks->name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" class="form-control" name="subject" placeholder="Enter student name" value="{{$marks->subject}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Marks</label>
            <input type="text" class="form-control" name="marks" placeholder="Enter student name" value="{{$marks->marks}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Remarks</label>
            <input type="text" class="form-control" name="remakrs" placeholder="Enter student name" value="{{$marks->remarks}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update Record</button>
        </div>
    </form>
</div>
@endsection
