@extends('layouts.master')
@section('title', 'Add New Author')
@section('content')
    <h2>Add New Author</h2>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="date_of_birth">Date of birth</label>
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
                @error('date_of_birth')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
    </form>
@endsection
