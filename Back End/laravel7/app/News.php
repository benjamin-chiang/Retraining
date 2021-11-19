<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';
    // 白名單，允許更改的欄位
    protected $fillable = ['title','date','content','view','img'];    
    // 黑名單，除了不允許更改的欄位，其他都允許
    // protected $guarded = ['title'];

}
