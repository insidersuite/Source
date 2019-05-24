<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'career';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['department', 'description', 'title_description', 'positions', 'banner_img'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
