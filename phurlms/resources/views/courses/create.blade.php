@extends('template')
@section('content')
<h1>Add New Course</h1>
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
<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    <input type="text" name="name" id="name" placeholder="Course Name"><br>
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="code" id="code" placeholder="Course Code"><br>
    @error('code')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <br>
    <input type="submit" value="Add Course">
</form>
@endsection