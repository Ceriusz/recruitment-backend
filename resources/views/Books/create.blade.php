@extends('books.layouts')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Book
                    </div>
                    <div class="float-end">
                        <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="author" class="col-md-4 col-form-label text-md-end text-start">Author</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
                                @if ($errors->has('author'))
                                    <span class="text-danger">{{ $errors->first('author') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
                                @if ($errors->has('quantity'))
                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="year" class="col-md-4 col-form-label text-md-end text-start">Year</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}">
                                @if ($errors->has('year'))
                                    <span class="text-danger">{{ $errors->first('year') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="category" class="col-md-4 col-form-label text-md-end text-start">Category</label>
                            <div class="col-md-6">
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                    <option></option>
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Book">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
