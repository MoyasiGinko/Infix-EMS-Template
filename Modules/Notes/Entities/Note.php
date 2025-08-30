<?php

namespace Modules\Notes\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Note extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'reference_id',
    'noteable_id',
    'noteable_type',
        'tags',
        'quantity',
        'amount',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Polymorphic parent relation (optional). Replaces generic reference_id when set.
     * Example parents: Expense, Income, Event models, etc.
     */
    public function noteable()
    {
        return $this->morphTo();
    }
}