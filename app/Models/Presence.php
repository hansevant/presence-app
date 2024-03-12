<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'material_id', 'assistant_id', 'code_id', 'teaching_role', 'date', 'start', 'end', 'duration']; 

    public function class()
    {
        return $this->belongsTo(LabClass::class, 'class_id', 'id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'assistant_id', 'assistant_id');
    }

    public function code()
    {
        return $this->belongsTo(Code::class, 'code_id', 'id');
    }
}
