<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql";


    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'contact_us';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message'
    ];

    // restrics column from modifying
    protected $gaurded = [];

}
