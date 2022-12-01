<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'number',
        'level',
        'limitation',
        'head_id',
    ];

    public function head()
    {
        return this->belongsTo(User::class, 'head_id', 'id');
    }
}
