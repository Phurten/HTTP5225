@extends('template')
@section('content')
<h1>Update Course</h1>
<div class="container">
    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
<form action="{{ route('courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" id="name" value="{{ old('name', $course->name) }}" placeholder="Course Name"><br>
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="code" id="code" value="{{ old('code', $course->code) }}" placeholder="Course Code"><br>
    @error('code')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <br>
    <input type="submit" value="Update Course">
</form>
@endsection