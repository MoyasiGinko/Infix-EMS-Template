<?php

namespace Modules\Notes\Entities;

use Illuminate\Database\Eloquent\Model;

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
}