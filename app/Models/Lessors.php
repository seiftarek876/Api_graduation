<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessors extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'subscribtion_fee',
    ];
    use HasFactory;
    public function binGroups() {
        return $this->hasMany(binGroups::class , 'subscriber_id');
    }
}
