@extends('template')
@section('content')
    <h1>All Professors</h1>
    <div class="container">
        <div class="row">
            @foreach ($professors as $professor)
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $professor->fname }} {{ $professor->lname }}</h5>
                            <a href="mailto:{{ $professor->email }}" class="btn btn-primary">{{ $professor->email }}</a>
                            <div class="card-footer">
                                <a href="{{ route('professors.show', $professor) }}" class="btn btn-sm btn-success">View</a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-sm btn-success">Edit</a>
                            </div>
                            <form action="{{ route('professors.destroy', $professor) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete Professor">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <br>
        </div>
    </div>
@endsection