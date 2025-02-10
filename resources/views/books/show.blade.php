@extends('layouts.app')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">📖 Book Details</h1>

        <div class="space-y-4">
            <p><strong>📚 Title:</strong> {{ $book->title }}</p>
            <p><strong>🔢 ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>✍️ Author:</strong> {{ $book->author }}</p>
            <p><strong>📆 Year of Publication:</strong> {{ $book->year_of_publication }}</p>
            <p><strong>🏢 Publisher:</strong> {{ $book->publisher }}</p>
            <p><strong>📦 Volumes:</strong> {{ $book->volumes_number }}</p>
            <p><strong>📍 Location:</strong> Section {{ $book->section }}, Bookcase {{ $book->bookcase }}, Shelf {{ $book->shelf }}</p>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('books.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">⬅️ Back</a>
            <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition">✏️ Edit</a>
        </div>
    </div>
@endsection
