<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    #[Test] function get_can_all_books()
    {
        $books = Book::factory(4)->create();
       $response = $this->getJson(route('books.index'));
       $response->assertJsonFragment([
           'title'=>$books[0]->title
       ])->assertJsonFragment([
           'title'=>$books[1]->title
       ]);
    }

    #[Test] function get_can_one_book()
    {
        $book = Book::factory(1)->create();
        $response = $this->getJson(route('books.show', $book));
        $response->assertJsonFragment([
            'title'=> $book->title
        ]);

    }

    #[Test] function can_create_book()
    {
        $this->postJson(route('books.store'),[])
        ->assertJsonValidationErrorFor('title');

        $this->postJson(route('books.store'),[
            'title'=> 'Love in the night',
            'anio' => '1885'
        ])->assertJsonFragment([
            'title' => 'Love in the night',
            'anio' => '1885'
        ]);

        $this->assertDatabaseHas('books',[
            'title' => 'Love in the night'
        ]);

    }

    #[Test] function can_update_books()
    {
        $book = Book::factory()->create();

        // si se retire validation de dates en methods.controller esta linea march error
        $this->patchJson(route('books.update',$book),[])
            ->assertJsonValidationErrorFor('title');

        $this->patchJson(route('books.update', $book),[
            'title' => 'Amor entre Mares',
            'anio' => '1102'
        ])->assertJsonFragment([
            'title' => 'Amor entre Mares',
            'anio' => '1102'
        ]);
// see exits register
        $this->assertDatabaseHas('books',[
            'title' => 'Amor entre Mares',
            'anio' => '1102'
        ]);

    }

    #[Test] function can_delete_books()
    {
        //creamos un libro
        $book = Book::factory()->create();

        //hacemos un delete a la ruta destroy pasando e libro como parametro
        $this->deleteJson(route('books.destroy', $book))
        ->assertNoContent(); // esperamos no content

        // hacemos una verificacion
        //decimos que en las tabla tenemos 0 registros
        $this->assertDatabaseCount('books',0);
    }
}
