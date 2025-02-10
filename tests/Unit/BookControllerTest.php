<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_book()
    {
        $bookData = [
            'title' => 'Test Book',
            'isbn' => '1234567890123',
            'author' => 'John Doe',
            'year_of_publication' => 2022,
            'publisher' => 'Test Publisher',
            'volumes_number' => 1,
            'section' => 'A',
            'bookcase' => 2,
            'shelf' => 3,
        ];

        $response = $this->post(route('books.store'), $bookData);

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseHas('books', ['title' => 'Test Book']);
    }

    #[Test]
    public function it_can_update_a_book()
    {
        $book = Book::factory()->create();

        $updatedData = [
            'title' => 'Updated Book',
            'isbn' => '9876543210987',
            'author' => 'Jane Doe',
            'year_of_publication' => 2023,
            'publisher' => 'Updated Publisher',
            'volumes_number' => 2,
            'section' => 'B',
            'bookcase' => 4,
            'shelf' => 5,
        ];

        $response = $this->put(route('books.update', $book->id), $updatedData);

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseHas('books', ['title' => 'Updated Book']);
    }

    #[Test]
    public function it_can_delete_a_book()
    {
        $book = Book::factory()->create();

        $response = $this->delete(route('books.destroy', $book->id));

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    #[Test]
    public function it_can_search_books()
    {
        Book::factory()->create(['title' => 'Unique Book Title']);

        $response = $this->get(route('books.search', ['query' => 'Unique Book Title']));

        $response->assertStatus(200);
        $response->assertSee('Unique Book Title');
    }

    #[Test]
    public function it_shows_error_if_no_books_found()
    {
        $response = $this->get(route('books.search', ['query' => 'Nonexistent Book']));

        $response->assertRedirect(route('books.index'));
        $response->assertSessionHas('error', 'No books found matching your search.');
    }
}
