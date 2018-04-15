<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = new Category();
        $categorys = $category->getCategorys();
        $category = [];

        foreach ( $categorys as $item ) {
            array_push($category, $item);
        }

        return view('welcome', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//dd($request->post('isbn'));
//     $validatedData = $request->validate([
//
//    ]);
        $validator = Validator::make($request->all(),[
            'isbn' => 'numeric|required|unique:books|digits:13',
            'book_name' => 'required|max: 255',
            'book_author' => 'nullable',
            'book_release' => 'nullable',
            'page_count' => 'nullable|integer',
            'category' => 'nullable'
        ]);


        if ($validator->fails()) {
           $test = $validator->errors();
//           dd($test->getMessages());
            foreach ($test->get('isbn') as $message){
                echo $message;
           }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
