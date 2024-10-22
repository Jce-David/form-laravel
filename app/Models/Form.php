<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

    protected $fillable = [
        'user_id', 'dni', 'first_name', 'last_name', 'date', 'sex'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
