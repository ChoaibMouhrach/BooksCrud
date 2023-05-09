@extends('layouts.dashboard')
@section('content')
    <section>
        <div class="bg-white border-b border-gray-300 text-white">
            <div class="container mx-auto p-4 flex items-center justify-between">
                <a href="/books">Home</a>
                <a href="/books/create"
                    class="flex items-center py-2 px-3 flex items-center gap-2 bg-gray-900 rounded-md font-semibold">
                    <span class="text-white">
                        Add new produuct
                    </span>
                </a>
            </div>
        </div>
        <div class="container mx-auto p-4">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 text-left tracking-wide">#</th>
                        <th class="p-3 text-left tracking-wide">Title</th>
                        <th class="p-3 text-left tracking-wide">Author</th>
                        <th class="p-3 text-left tracking-wide">Price</th>
                        <th class="p-3 text-left tracking-wide">Created At</th>
                        <th class="p-3 text-left tracking-wide">Updated At</th>
                        <th class="p-3 text-left tracking-wide">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td class="p-3 tracking-wide">
                                {{ $book->id }}
                            </td>
                            <td class="p-3 tracking-wide">
                                {{ $book->title }}
                            </td>
                            <td class="p-3 tracking-wide">
                                {{ $book->author }}
                            </td>
                            <td class="p-3 tracking-wide">
                                {{ $book->price }}
                            </td>
                            <td class="p-3 tracking-wide">
                                {{ $book->created_at }}
                            </td>
                            <td class="p-3 tracking-wide">
                                {{ $book->updated_at }}
                            </td>
                            <td class="p-3 tracking-wide flex items-center gap-2">
                                <a href="/books/{{ $book->id }}" class="bg-purple-700 p-3 rounded-md text-white">
                                    View
                                </a>
                                <a href="/books/{{ $book->id }}/edit" class="bg-green-700 p-3 rounded-md text-white">
                                    Update
                                </a>
                                <form action="/books/{{ $book->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submti" class="bg-red-700 text-white p-3 rounded-md">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $books->links() }}
        </div>
    </section>
@endsection
