<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function professor()
    {
        return $this->hasOne(Professor::class);
    }
}
