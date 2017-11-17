<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';

    protected $fillable = [
        'first_name', 'last_name', 'address', 'dob', 'phone', 'email', 'nationality', 'gender', 'city', 'country', 'zip'
    ];
}
