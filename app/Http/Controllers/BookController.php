<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Category;
//use Illuminate\Http\Response;



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
        $category->store();
        $categorys = $category->getCategorys();
        $category = [];

        foreach ( $categorys as $item ) {
            array_push($category, $item);
        }
        $books = new Book();
        $books = $books->getAllbooks();

        return view('welcome', ['category' => $category, 'books' => $books]);
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

        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'isbn' => 'numeric|required|unique:books',
                'book_name' => 'required|max: 255',
                'page_count' => 'nullable|integer'
            ]);

            if ($validator->fails()) {
                $test = $validator->errors();

                foreach ($test->get('isbn') as $message) {
                    return response()->json($message);
                }
            } else {
                $isbnNumber = $request->post('isbn');
                $bookName = $request->post('book_name');
                $bookAuthor = $request->post('book_author');
                $bookRelease = $request->post('book_release');
                $pageCount = $request->post('page_count');
                $categoryId = $request->post('category');
                try {
                    $book = new Book();
                    $book->addBook($isbnNumber, $bookName, $bookAuthor, $bookRelease, $pageCount, $categoryId);
                    return response()->json('Sukces', 200);
                } catch (\Exception $exception) {
                    return response()->json($exception);
                }
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
