<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public  $table = 'user';

    public $primaryKey = 'user_id';

//    public $fillable = ['user_name',]
    public $guarded = [];

    public $timestamps = false;
}
