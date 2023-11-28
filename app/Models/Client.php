<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Automobile;
class Client extends Model
{
    use HasFactory;
    protected $table = 'client';
    protected $guarded = [];

    public function automobiles()
    {
        return $this->hasMany(Automobile::class,"client_id","id");
    }

}
