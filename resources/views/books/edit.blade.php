@extends('layouts.app')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-yellow-600 mb-6">✏️ Edit Book</h1>

        <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            @foreach ([
                'title' => 'Book Title',
                'isbn' => 'ISBN',
                'author' => 'Author',
                'year_of_publication' => 'Year of Publication',
                'publisher' => 'Publisher',
                'volumes_number' => 'Volumes Number',
                'section' => 'Section',
                'bookcase' => 'Bookcase',
                'shelf' => 'Shelf'
            ] as $field => $label)
                <div>
                    <label class="block text-gray-700 font-semibold">{{ $label }}</label>
                    <input type="text" name="{{ $field }}" value="{{ $book->$field }}" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
            @endforeach

            <button type="submit" class="w-full bg-yellow-500 text-white py-3 rounded-md hover:bg-yellow-600 transition">
                Update Book
            </button>
        </form>
    </div>
@endsection
