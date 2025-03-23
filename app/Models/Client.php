<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Client extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value === '' ? null : $value);
    }
    public function consultant()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
        // 'user_id' is the foreign key in clients table
        // 'id' is the primary key in users table
    }
    public function universityDegree()
    {
        return $this->hasMany(ClientUniversityDegree::class);
    }
    public function schoolEducation()
    {
        return $this->hasMany(ClientSchoolEducation::class);
    }
    public function training()
    {
        return $this->hasMany(ClientTraining::class);
    }
    public function jobSituation()
    {
        return $this->hasMany(ClientJobSituation::class);
    }
    public function languageSkill()
    {
        return $this->hasMany(ClientLanguageSkill::class);
    }
}
