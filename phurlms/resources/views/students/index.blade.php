@extends('template')
@section('content')
    <h1>All Students</h1>

    @foreach ($students as $student)

        {{ $student->fname }} <a href="{{ route('students.show', $student) }}">View</a>
        <form action="{{ route('students.destroy', $student) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete Student">
        </form>
        <br>
    @endforeach

@endsection