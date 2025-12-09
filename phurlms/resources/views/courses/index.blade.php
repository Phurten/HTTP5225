@extends('template')
@section('content')
<h1>All Courses</h1>
<div class="container">
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <span class="badge bg-light text-secondary border mb-2"><strong>Code:</strong> {{ $course->code }}</span>
                        <div class="card-footer">
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-success">View</a>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-success">Edit</a>
                        </div>
                        <form action="{{ route('courses.destroy', $course) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete Course">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection