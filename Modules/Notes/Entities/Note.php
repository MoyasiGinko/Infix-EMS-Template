<?php

namespace Modules\Notes\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Note extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'reference_id',
        'tags',
        'quantity',
        'amount',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}