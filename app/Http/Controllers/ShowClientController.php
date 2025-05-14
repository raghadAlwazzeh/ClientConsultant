<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientJobSituation;
use App\Models\ClientLanguageSkill;
use App\Models\ClientSchoolEducation;
use App\Models\ClientTraining;
use App\Models\ClientUniversityDegree;

class ShowClientController extends Controller
{
    public function showClientSchoolEducation($id){
        $education= ClientSchoolEducation::with('client')->findOrFail($id);
        return view('showClient.schoolCertificate', compact('education'));
    }
    public function showClientTraining($id){
        $training= ClientTraining::with('client')->findOrFail($id);
        return view('showClient.clientTraining', compact('training'));
    }
    public function showClientUniversityDegree($id){
        $education= ClientUniversityDegree::with('client')->findOrFail($id);
        return view('showClient.clientUniversityDegree', compact('education'));
    }
    public function showClientJob($id){
        $job= ClientJobSituation::with('client')->findOrFail($id);
        return view('showClient.clientJob', compact('job'));
    }
    public function showClientLanguageSkill($id){
        $language= ClientLanguageSkill::with('client')->findOrFail($id);
        return view('showClient.clientLanguageSkill', compact('language'));
    }
}
