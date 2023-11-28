<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobile extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'automobile';

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
