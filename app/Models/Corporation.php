<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{
    protected $fillable = [
    'event_date',
    'district',
    'event_type',
    'event_other',
    'activity_type',
    'aqb_actors',
    'external_actors',
    'actor_type',
    'actor_type_other',
    'short_title',
    'location',
    'notes',
];
}
