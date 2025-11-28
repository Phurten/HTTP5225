@extends('template')
@section('content')
<h1>All Courses</h1>
@foreach ($courses as $course)
        {{ $course->name }} ({{ $course->code }})
        <a href="{{ route('courses.show', $course) }}">View</a>
        <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete Course">
        </form>
@endforeach
@endsection