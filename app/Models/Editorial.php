<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Entity
{




      public static function selectEditorialsList()
    {
          
          //return Editorial::all('name');
          
                return Editorial::select('id','name')
                    ->OrderBy ('name','ASC')
                            ->get();
                             
    }
    
//    $ciudad =  \App\Models\City::where('id_provincia',$id)
//            ->select('id as value','nombre as text')
//            ->OrderBy ('nombre','ASC')
//            ->get()
//             ->toArray();
}
