<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BooksApiTest extends TestCase
{
    use RefreshDatabase;

    function can_get_all_books()
    {
        //
       // $book = Book::factory()->create();
        //dd($book);
        $books = Book::factory(4)->create();
        dd($books->count());

    }
}
