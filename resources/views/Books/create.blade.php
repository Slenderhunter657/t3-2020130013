@extends('layouts.master')
@section('title', 'Add New Book')
@section('content')
    <h2>Add New Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="id">Book ID</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id" value="{{ old('id') }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-8 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="page">Page</label>
                <input type="text" class="form-control @error('page') is-invalid @enderror" name="page" id="page" value="{{ old('page') }}">
                @error('page')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="category">Category</label>
                <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" id="category" value="{{ old('category') }}">
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="publisher">Publisher</label>
                <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" id="publisher" value="{{ old('publisher') }}">
                @error('publisher')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="author_id">Author</label>
                {{-- <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" value="{{ old('author') }}"> --}}
                <select class="form-control @error('author_id') is-invalid @enderror" name="author_id" id="author_id">
                    <option value="none" disabled selected>Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{old('author_id') == $author->id  ? 'selected' : ''}}>{{$author->name}}</option>
                    @endforeach
                </select>
                @error('author_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
    </form>
@endsection
