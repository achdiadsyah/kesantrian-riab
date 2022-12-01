<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuList extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'id',
        'name',
        'alias',
        'route',
        'favicon',
        'description',
        'order',
        'parent_id',
        'is_parent',
        'is_active',
    ];

    public function child()
    {
        return $this->hasMany(MenuList::class, 'parent_id', 'id');
    }
}
