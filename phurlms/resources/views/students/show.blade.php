@extends('template')
@section('content')

<h3> Name: {{ $student->fname }}</h3>
<p>Email: {{ $student->email }}</p>

@endsection