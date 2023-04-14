<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    // Allows us to add fields -- an array of fields we can add
    protected $fillable = [
        "title",
        "completed",
    ];
}
