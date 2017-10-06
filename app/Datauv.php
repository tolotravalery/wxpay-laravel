<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Datauv extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'datauv';
    protected $fillable = [
        'nom', 'email', 'id_customer','item_number','amount','nbre_place',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
