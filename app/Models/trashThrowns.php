<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trashThrowns extends Model
{
    protected $fillable = [
        'user_id',
        'bin_id',
        'score'
    ];
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function bin(){
        return $this->belongsTo(bins::class);
    }
}
