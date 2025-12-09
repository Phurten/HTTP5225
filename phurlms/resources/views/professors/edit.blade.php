@extends('template')
@section('content')
    <h3>Update Professor</h3>
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
    <form action="{{ route('professors.update', $professor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="fname" value="{{ old('fname', $professor->fname) }}" placeholder="First Name"><br>
        @error('fname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
        <input type="text" name="lname" value="{{ old('lname', $professor->lname) }}" placeholder="Last Name"><br>
        @error('lname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
        <input type="email" name="email" value="{{ old('email', $professor->email) }}" placeholder="Email"><br>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Update Professor">
    </form>
@endsection
