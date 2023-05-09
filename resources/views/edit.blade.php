@extends('layouts/dashboard')
@section('content')
    <section class="container mx-auto">
        <h1 class="text-2xl my-8">Update Book</h1>
        <form action="/books/{{ $book->id }}" class="flex flex-col gap-2" method="POST">
            @method('patch')
            @csrf

            <div class="flex flex-col gap-2">
                <label for="title">Title</label>
                <input id="title" type="text" name="title" placeholder="Title" value="{{ $book->title }}"
                    class="bg-gray-100 border border-gray-300 p-2 rounded-md" />
            </div>


            <div class="flex flex-col gap-2">
                <label for="author">Author</label>
                <input id="author" type="text" name="author" placeholder="author" value="{{ $book->author }}"
                    class="bg-gray-100 border border-gray-300 p-2 rounded-md" />
            </div>


            <div class="flex flex-col gap-2">
                <label for="price">Price</label>
                <input id="price" type="number" name="price" placeholder="price" value="{{ $book->price }}"
                    class="bg-gray-100 border border-gray-300 p-2 rounded-md" />
            </div>

            <button type="submit" class="bg-gray-100 border w-fit border-gray-300 p-2 rounded-md">
                Update
            </button>

        </form>
    </section>
@endsection
