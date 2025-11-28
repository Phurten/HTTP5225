@extends('template')
@section('content')
<h1>{{ $course->name }}</h1>
<p>Course Code: {{ $course->code }}</p>
@endsection