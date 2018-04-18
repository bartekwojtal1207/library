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
                ->get();

            return $books;

        } catch (\Exception $exception) {
            echo $exception;
        }
    }


    public function addBook($isbnNumber, $bookName, $bookAuthor, $bookRelease, $pageCount, $categoryName )
    {
        try {
            DB::table('books')->insert(
                ['ISBN' => $isbnNumber,
                    'book_name' => $bookName,
                    'author' => $bookAuthor,
                    'number_pages' => $pageCount,
                    'release_date' => $bookRelease,
                    'category_name' => $categoryName ]
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
