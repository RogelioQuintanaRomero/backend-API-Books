<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $data =[
            'books' => $books,
            'status' => 200
        ];
//        return response()->json($data, 200);
        return Book::all();
//        return Book::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required'],
            'anio'=>['required']
        ]);
        $book = new Book;
        $book->title = $request->input('title');
        $book->anio = $request->anio;

        $book->save();

        return $book;
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return $book;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $request->validate([
            'title'=>'required'
        ]);

        $book->title=$request->input('title');
        $book->anio=$request->anio;
        $book->save();

        return $book;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();

        return response()->noContent();
    }
}
