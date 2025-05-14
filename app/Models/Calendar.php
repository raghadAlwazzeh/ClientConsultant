<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $guarded = [];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function consultant()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }
    public function toEvent()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'start' => $this->start_time,
            'end' => $this->end_time,
            'description' => $this->description,
            'client' => $this->client->name,
            'consultant' => $this->consultant->name
        ];
    }
}
