<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
//        $this->belongsTo() in primary key
        return $this->belongsTo(Category::class,'cat_id');
    }

    public static $rules =[
        'name'=>'required',
//        'price'=>'required',
//        'size'=>'required',
//        'cat_id'=>'required',
//        'description'=>'max:100|min:5',
    ];
}
