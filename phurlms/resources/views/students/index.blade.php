@extends('template')
@section('content')
    <h1>All Students</h1>
    <div class="container">
        <div class="row">
            @foreach ($students as $student)
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $student->fname }} {{ $student->lname }}</h5>
                            <a href="mailto:{{ $student->email }}" class="btn btn-primary">{{ $student->email }}</a>
                            <div class="card-footer">
                                <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-success">View</a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('students.edit', $student -> id) }}" class="btn btn-sm btn-success">Edit</a>
                            </div>                            
                            <form action="{{ route('students.destroy', $student) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete Student">
                    </form>
                        </div>
                    </div>
                    
                </div>
            @endforeach
            <br>

        </div>
    </div>

@endsection