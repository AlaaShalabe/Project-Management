<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'startTime',
        'endTime' ,
    ];

    public function users()
    {
        return $this->hasMany(User::class , 'shift_id' ,'id');
    }

}
