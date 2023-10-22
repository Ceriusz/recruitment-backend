@extends('books.layouts')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Books List</div>
                <div class="card-body">
                    <a href="{{ route('books.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Book</a>
                    <form action="{{ route('books.index') }}" method="GET">
                        Title: <input name="searchTitle" type="text" value="{{ $searchTitle }}">
                        Author: <input name="searchAuthor" type="text" value="{{ $searchAuthor }}">
                        Category: <select name="searchCategoryId">
                            <option value="allCategories" @if ($searchCategoryId === 'allCategories') selected @endif>All categories</option>
                            <option @if (is_null($searchCategoryId)) selected @endif></option>
                            @foreach ($categories as $key => $category)
                                <option value="{{ $category->id }}" @if ($category->id === $searchCategoryId) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-dark mt-2">Search</button>
                    </form>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Year</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->quantity }}</td>
                                <td>{{ $book->year }}</td>
                                <td>{{ $book->category?->name }}</td>
                                <td>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash" onclick="return confirm('Do you want to delete this book?');"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Book Found!</strong>
                                </span>
                            </td>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $books->links() }}

                </div>
            </div>
        </div>
    </div>

@endsection
