@extends ('template')
@section('content')
<h3>
Create Student 
</h3>
<form action="{{ route('students.store') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="fname" placeholder="First Name"><br>
    <input type="text" name="lname" placeholder="Last Name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="submit" value="Add Student">
</form>
@endsection