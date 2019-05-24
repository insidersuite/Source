<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'review';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['id', 'type', 'type_id', 'grade', 'content', 'username', 'pic'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
