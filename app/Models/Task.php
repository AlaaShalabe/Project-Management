<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cost',
        'sub_specialty_id',

    ];
    public function sub_specialty()
    {
        return $this->belongsTo(SubSpecialty::class);
    }
}
