<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class ContactUs extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contact_us';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'title', 'content', 'created_at', 'updated_at'];

}
