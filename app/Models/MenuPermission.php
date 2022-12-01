<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPermission extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'id',
        'user_id',
        'menu_id',
    ];

    public function allMenu()
    {
        return $this->hasOne(MenuList::class, 'id', 'menu_id');
    }
}
