@extends('layouts.master')
@section('title', $author->name)
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $author->name }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5> <span class="badge badge-primary">
                <i class="fa fa-star fa-fw"></i> Date of Birth: {{ $author->date_of_birth }} </span> </h5>
        <h5> <span class="badge badge-info">
                <i class="fa fa-star fa-fw"></i> Email: {{ $author->email }} </span> </h5>
    </div>
@endsection
