<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        $books = Book::all();
        return view('books.index',compact('books','authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create',compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id' => 'required|min:5|max:5',
            'title' => 'required|max:255',
            'page' => 'required|integer|min:1|max:99999',
            'category' => 'required|max:255',
            'publisher' => 'required|max:255',
            'author_id' => 'required|not_in:none'
        ];
        $validated = $request->validate($rules);
        Book::create($validated);
        $request->session()->flash('success',"Successfully added {$validated['title']}!");
        return redirect(route('books.index'));
        // dump($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view("books.edit",compact("book",'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'id' => 'required|min:5|max:5',
            'title' => 'required|max:255',
            'page' => 'required|integer|min:1|max:99999',
            'category' => 'required|max:255',
            'publisher' => 'required|max:255',
            'author_id' => 'required|not_in:none'
        ];
        $validated = $request->validate($rules);
        $book->update($validated);
        $request->session()->flash('success',"Successfully updated {$validated['title']}!");
        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect(route('books.index'))->with('success', "Successfully deleted {$book['title']}!");
    }
}
