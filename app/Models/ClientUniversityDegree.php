<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientUniversityDegree extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
