<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSpecialty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'specialty_id'
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
