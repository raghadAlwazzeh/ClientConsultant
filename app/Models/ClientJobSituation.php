<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientJobSituation extends Model
{
    protected $guarded = [];
    public function client()
    {
        return $this->belongsTo(User::class);
    }
}
