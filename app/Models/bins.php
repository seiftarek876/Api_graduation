<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bins extends Model
{
    protected $fillable = [
        'type',
        'isFull',
        'capacity',
        'trash_weight',
        'current_trash_weight',
        'bin_group_id'
    ];
    use HasFactory;
    public function binGroup(){
        return $this->belongsTo(binGroups::class , 'bin_group_id' , 'id');
    }
    public function trashThrown(){
        return $this->hasOne(trashThrowns::class , 'bin_id' , 'id');
    }
    
}
