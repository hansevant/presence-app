<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'maker_by', 'used_by'];

    public function maker()
    {
        return $this->belongsTo(User::class, 'maker_by', 'assistant_id');
    }

    public function used()
    {
        return $this->belongsTo(User::class, 'used_by', 'assistant_id');
    }
}
