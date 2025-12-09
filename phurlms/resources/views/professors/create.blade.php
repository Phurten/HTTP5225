@extends('template')
@section('content')
    <h3>Add Professor</h3>
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
    <form action="{{ route('professors.store') }}" method="POST">
        @csrf
        <input type="text" name="fname" placeholder="First Name"><br>
        @error('fname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
        <input type="text" name="lname" placeholder="Last Name"><br>
        @error('lname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
        <input type="email" name="email" placeholder="Email"><br>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Add Professor">
    </form>
@endsection
