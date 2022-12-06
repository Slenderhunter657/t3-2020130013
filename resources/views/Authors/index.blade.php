@extends('layouts.master')
@section('title', 'Author List')
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
                        <h2>Author List</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('authors.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Add New Author</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($authors as $author)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $author->id }}</td>
                            <td><a href="{{ route('authors.show', $author->id) }}"> {{ $author->name }}</a></td>
                            <td>{{ $author->date_of_birth }}</td>
                            <td>{{ $author->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="7">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
