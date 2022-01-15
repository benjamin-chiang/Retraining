<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $classId
 * @property string $major
 * @property string $created_at
 * @property string $updated_at
 */
class Student extends Model
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
    protected $fillable = ['name', 'classId', 'major', 'created_at', 'updated_at'];

}
