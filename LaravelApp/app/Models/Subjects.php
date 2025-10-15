<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;
    protected $table = "subjects";

     public function user_subjects()
    {
        return $this->belongsToMany(User::class,"user_subjects", "subject_id", "user_id");
    }
}
