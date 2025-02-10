<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📚 Library Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">
    <nav class="bg-blue-600 shadow-md text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('books.index') }}" class="text-xl font-bold hover:text-gray-200">📚 Library System</a>
            <a href="{{ route('books.create') }}" class="px-4 py-2 bg-green-500 hover:bg-green-600 rounded-md shadow-md transition">➕ Add Book</a>
        </div>
    </nav>

    <main class="flex-grow container mx-auto p-4">
        @yield('content')
    </main>

    <footer class="bg-blue-600 text-white text-center py-3 shadow-inner">
        📖 Library System &copy; {{ date('Y') }}
    </footer>
</body>
</html>
