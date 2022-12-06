@extends('layouts.master')
@section('title', $book->title)
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $book->title }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5> <span class="badge badge-primary">
                <i class="fa fa-star fa-fw"></i> Pages: {{ $book->page }} </span> </h5>
        <p>
            <hr>
        <ul class="list-inline">
            <li class="list-inline-item"> <i class="fa fa-th-large fa-fw"></i> <em>Category: {{ $book->category }}</em> </li><br>
            <li class="list-inline-item"><i class="fa fa-calendar fa-fw"></i> Publisher: {{ $book->publisher }} </li><br>
            <li class="list-inline-item"><i class="fa fa-calendar fa-fw"></i> <b><a href="{{ route('authors.show', $book->author->id) }}">Author: {{ $book->author->name }}</a></b> </li>
        </ul>
        </p>
    </div>
@endsection
