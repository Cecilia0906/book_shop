<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Entity
{
    
     public static function selectCategoriesList()
    {

                return Category::select('id','name')
                    ->OrderBy ('name','ASC')
                            ->get();
                             
    }
}
