@extends('template')
@section('content')
    <h3>Professor Details</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $professor->fname }} {{ $professor->lname }}</h5>
                        <p class="card-text"><strong>Email:</strong> <a href="mailto:{{ $professor->email }}">{{ $professor->email }}</a></p>
                        <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('professors.destroy', $professor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete Professor" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        </form>
                        <a href="{{ route('professors.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
