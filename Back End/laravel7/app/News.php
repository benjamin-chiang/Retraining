<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $date
 * @property string $img
 * @property string $content
 * @property int $views
 * @property string $created_at
 * @property string $updated_at
 */
class News extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title', 'date', 'img', 'content', 'views', 'created_at', 'updated_at'];

}
