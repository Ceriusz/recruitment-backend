<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    private const PAGINATE = 10;
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $books = Book::latest();

        if (request()->has('searchTitle')) {
            $books = $books->where('title', 'like', '%' . request()->get('searchTitle') . '%');
        }

        if (request()->has('searchAuthor')) {
            $books = $books->where('author', 'like', '%' . request()->get('searchAuthor') . '%');
        }

        if (request()->has('searchCategoryId') && request()->get('searchCategoryId') !== 'allCategories') {
            $books = $books->where('category_id', request()->get('searchCategoryId'));
        }

        return view('books.index', [
            'books' => $books->paginate(self::PAGINATE),
            'categories' => Category::all(),
            'searchTitle' => request()->get('searchTitle'),
            'searchAuthor' => request()->get('searchAuthor'),
            'searchCategoryId' => request()->get('searchCategoryId')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('books.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request) : RedirectResponse
    {
        Book::create($request->all());
        return redirect()->route('books.index')
            ->withSuccess('New book was added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book) : View
    {
        return view('books.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book) : View
    {
        return view('books.edit', [
            'book' => $book,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book) : RedirectResponse
    {
        $book->update($request->all());
        return redirect()->back()
            ->withSuccess('Book was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book) : RedirectResponse
    {
        $book->delete();
        return redirect()->route('books.index')
            ->withSuccess('Book was deleted successfully.');
    }
}
