<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Database\Query\Builder;


class Category extends Model
{
    protected $table = 'category';

        public function getCategoryName($bookId)
        {
            $categoryName =  DB::table($this->table)
                ->select('category_name')
                ->where('id', $bookId)
                ->get();
            return $categoryName;
        }

        public function store()
        {

            $url = 'https://wolnelektury.pl/api/genres/';
            $obj = json_decode(file_get_contents($url), true);

            try
            {
                foreach ($obj as $item)
                {
                    $category =  DB::table($this->table)
                        ->insert(['category_name' => $item['name']]);
                }

            }catch (\Exception $eception)
            {
               return view('welcome');
            }

        }

        public function getCategorys ()
        {
            try
            {
                $categorys = DB::table($this->table)
                    ->select()
                    ->get();
                return $categorys;
            }catch (\Exception $e)
            {
                return view('welcome');
            }
        }

        public function book()
        {
            return $this->hasMany(Book::class);
        }

}
