@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Add Marks</h1>
    <form method="post" action="/marks/add">
        {{-- CSRF: Cross Site Forgery Request --}}
        @csrf
        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter student name" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" class="form-control" name="subject" placeholder="Enter subject name" value="{{ old('subject') }}">
            @error('subject')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Marks</label>
            <input type="text" class="form-control" name="marks" placeholder="Enter student marks" value="{{ old('marks') }}">
            @error('marks')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Remarks</label>
            <input type="text" class="form-control" name="remarks" placeholder="Enter remarks" value="{{ old('remarks') }}">
            @error('remarks')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection
