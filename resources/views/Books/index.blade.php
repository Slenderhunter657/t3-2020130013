@extends('layouts.master')
@section('title', 'Book List')
@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush
@section('content')

@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-10">
                        <h2>Book List</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('books.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Add New Film</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Page</th>
                        <th>Category</th>
                        <th>Publisher</th>
                        {{-- <th>Author</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('movies.show', $book->id) }}"> {{ $book->title }}</a></td>
                            <td>{{ $book->page }}</td>
                            <td>{{ $book->category }}</td>
                            <td>{{ $book->publisher }}</td>
                            {{-- <td>{{ $book->author }}</td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="5">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
