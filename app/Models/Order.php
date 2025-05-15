<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetime',
        'status',
        'reason',
        'user_id',
        'plase_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
