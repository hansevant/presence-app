<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'material_id', 'assistant_id', 'code_id', 'teaching_role', 'date', 'start', 'end', 'duration']; 
}
