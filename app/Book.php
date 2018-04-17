<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    public function getAllbooks()
    {
        try {
            $books = DB::table('books')
                ->leftJoin('category', 'books.category_id', '=','category.id')
                ->get();

            return $books;

        } catch (\Exception $exception) {
            echo $exception;
        }
    }


    public function addBook($isbnNumber, $bookName, $bookAuthor, $bookRelease, $pageCount, $categoryId )
    {
        try {
            DB::table('books')->insert(
                ['ISBN' => $isbnNumber,
                    'book_name' => $bookName,
                    'author' => $bookAuthor,
                    'number_pages' => $pageCount,
                    'release_date' => $bookRelease,
                    'category_id' => $categoryId ]
            );
        }catch (\Exception $exception){
            echo $exception;
        }

    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
