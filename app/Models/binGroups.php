<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binGroups extends Model
{
    protected $fillable = [
        'location',
        'bins_count',
        'id',
        'status',
        'admin_id',
        'lessor_id'
    ];
    use HasFactory;
    public function bins() {
        return $this->hasMany(bins::class , 'bin_group_id');
    }
    public function admin() {
        return $this->belongsTo(admins::class , 'admin_id');
    }
    public function lessor() {
        return $this->belongsTo(Lessors::class , 'lessors');
    }
}
