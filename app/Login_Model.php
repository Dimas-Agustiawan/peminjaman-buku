<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login_Model extends Model
{
    //
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama','email','password'];
}
