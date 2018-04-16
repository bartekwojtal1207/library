<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    public function addBook($isbnNumber, $bookName, $bookAuthor, $bookRelease, $pageCount, $categoryId )
    {
        DB::table('books')->insert(
            ['ISBN' => $isbnNumber,
             'book_name' => $bookName,
             'author' => $bookAuthor,
             'number_pages' => $pageCount,
             'release_date' => $bookRelease,
             'category_id' => $categoryId ]
        );
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
