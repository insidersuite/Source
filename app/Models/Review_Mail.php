<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review_Mail extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'review_mail';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['id', 'name', 'location', 'experience_name', 'experience_id', 'accom_count', 'act_count', 'first_day', 'last_day', 'feedback_t_limit', 'review_flag'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
