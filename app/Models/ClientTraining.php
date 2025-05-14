<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientTraining extends Model
{
    protected $guarded = [];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
