@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 sm:p-8 rounded-lg shadow-xl max-w-6xl mx-auto">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-center text-blue-600 mb-6">📚 Library Management System</h1>

        <!-- 🔍 Search Bar -->
        <form action="{{ route('books.search') }}" method="GET" class="flex flex-col sm:flex-row justify-center gap-2 sm:gap-0 mb-6">
            <input
                type="text"
                name="query"
                value="{{ request('query') }}"
                placeholder="Search for books by title, author, ISBN, or publisher..."
                class="w-full sm:w-2/3 px-4 py-3 border border-gray-300 rounded-md sm:rounded-l-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                required
            >
            <button
                type="submit"
                class="px-6 py-3 bg-blue-500 text-white rounded-md sm:rounded-r-md hover:bg-blue-600 transition duration-300 font-semibold"
            >
                🔍 Search
            </button>
        </form>

        <!-- ✅ Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
                {{ session('error') }}
            </div>

            @if(request('query'))
                <div class="flex justify-center">
                    <a href="{{ route('books.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                        ⬅️ Go Back
                    </a>
                </div>
            @endif
        @endif

        <!-- 📋 Books Table -->
        @if($books->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden text-center">
                    <thead class="bg-gradient-to-r from-blue-500 to-blue-400 text-white uppercase text-sm tracking-wider">
                        <tr>
                            <th class="py-4 px-4 sm:px-6">📖 Title</th>
                            <th class="py-4 px-4 sm:px-6">🔢 ISBN</th>
                            <th class="py-4 px-4 sm:px-6">✍️ Author</th>
                            <th class="py-4 px-4 sm:px-6">🏢 Publisher</th>
                            <th class="py-4 px-4 sm:px-6">⚙️ Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm sm:text-base">
                        @foreach($books as $book)
                            <tr class="border-b hover:bg-gray-50 transition duration-300">
                                <td class="py-4 px-4 sm:px-6 font-semibold">{{ $book->title }}</td>
                                <td class="py-4 px-4 sm:px-6">{{ $book->isbn }}</td>
                                <td class="py-4 px-4 sm:px-6">{{ $book->author }}</td>
                                <td class="py-4 px-4 sm:px-6">{{ $book->publisher }}</td>
                                <td class="py-4 px-4 sm:px-6 space-y-2 sm:space-y-0 sm:space-x-3 flex flex-col sm:flex-row justify-center items-center">
                                    <a href="{{ route('books.show', $book->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">View</a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- ➕ Add New Book Button -->
        <div class="flex justify-center mt-6">
            <a href="{{ route('books.create') }}" class="px-8 py-4 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition duration-300 text-lg font-bold">
                ➕ Add New Book
            </a>
        </div>
    </div>
@endsection
