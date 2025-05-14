<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConversationProtocol extends Model
{
    protected $guarded = [];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function consultant()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
        // 'user_id' is the foreign key in clients table
        // 'id' is the primary key in users table
    }
}
