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

class EditClientController extends Controller
{
    public function editUniversityDegree($id)
    {
        $education = ClientUniversityDegree::findOrFail($id);
        return view('editClient.clientUniversityDegree', compact('education'));
    }
    public function updateUniversityDegree(Request $request, $id)
    {
        
        $education = ClientUniversityDegree::findOrFail($id);

        
        $education->update([
            
            'country' => $request->country,
            'study_duration' => $request->study_duration,
            'graduation_year' => $request->graduation_year,
            'study_institution' => $request->study_institution,
            'study_location' => $request->study_location,
            'study_titel' => $request->study_titel,
            'study_german_translate' => $request->study_german_translate,
            'refernce_job' => $request->refernce_job,
            'another_refernce_job' => $request->another_refernce_job,
            'regulated' => $request->regulated,
            'country_regulated' => $request->country_regulated,
            'same_country_job' => $request->same_country_job,
            'country_job_duration' => $request->country_job_duration,
            'same_germany_job' => $request->same_germany_job,
            'germany_job_duration' => $request->germany_job_duration,
            'available_certificate' => $request->available_certificate,
            'available_translation' => $request->available_translation,
            'applied_application' => $request->applied_application,
            'equivalence_assessment' => $request->equivalence_assessment,
            'equivalence_assessment_date' => $request->equivalence_assessment_date,
            'evaluation_result' => $request->evaluation_result,
            'evaluation_date' => $request->evaluation_date,
        ]);

        
        return redirect()->route('education.index')->with('success', 'تم تحديث البيانات بنجاح!');
    }


    public function editClientInfo($id)
    {
        $client = Client::findOrFail($id);
        return view('editClient.clientPersonalData', compact('client'));
    }
    public function updateClientInfo(Request $request, $id)
    {
        
        $client = Client::findOrFail($id);

        
        $client->update([
            
            'ort' => $request->ort,
            'landkreis' => $request->landkreis,
            'data_protection' => $request->data_protection,
            'education' => $request->education,
            'unknown_advice' => $request->unknown_advice,
            'advisor' => $request->advisor,
            'another_advisor' => $request->another_advisor,
            'recognation_person' => $request->recognation_person,
            'another_recognation_person' => $request->another_recognation_person,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'street' => $request->street,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
            'germany_residence' => $request->germany_residence,
            'state' => $request->state,
            'residence' => $request->residence,
            'gender' => $request->gender,
            'country' => $request->country,
            'birth_date' => $request->birth_date,
            'first_nationality' => $request->first_nationality,
            'second_nationality' => $request->second_nationality,
            'reise_date' => $request->reise_date,
            'job' => $request->job,
            'has_previous_application' => $request->has_previous_application,
            'previous_advisory_institution' => $request->previous_advisory_institution,
            'result' => $request->result,
            'rating' => $request->rating,
        ]);
    
    }

    public function editSchoolEducation($id)
    {
        $education = ClientSchoolEducation::findOrFail($id);
        return view('editClient.SchoolCertificate', compact('education'));
    }
    public function updateSchoolEducation(Request $request, $id)
    {
        
        $education = ClientSchoolEducation::findOrFail($id);

        
        $education->update([
            
            'school_country' =>$request->school_country,
            'school_study_duration' => $request->school_study_duration,
            'school_graduation_year' => $request->school_graduation_year,
            'qualification_level' => $request->qualification_level,
            'school_institution' => $request->school_institution,
            'school_location' => $request->school_location,
            'school_study_titel' => $request->school_study_titel,
            'school_german_translate' => $request->school_german_translate,
            'school_available_certificate' =>$request->school_available_certificate,
            'school_available_translation' => $request->school_available_translation,
        ]);
    
    }

    public function editTraining($id)
    {
        $training = ClientTraining::findOrFail($id);
        return view('editClient.clientTraining', compact('training'));
    }
    public function updateTraining(Request $request, $id)
    {
        
        $training = ClientTraining::findOrFail($id);

        
        $training->update([
            
            'training_country' => $request->training_country,
                'training_duration' => $request->training_duration,
                'training_completion_year' =>$request->training_completion_year,
                'training_institution' => $request->training_institution,
                'training_location' => $request->training_location,
                'training_titel' => $request->training_titel,
                'training_german_translate' => $request->training_german_translate,
                'refernce_job' => $request->refernce_job,
                'another_refernce_job' => $request->another_refernce_job,
                'regulated' => $request->regulated,
                'country_regulated' => $request->country_regulated,
                'same_country_job' => $request->same_country_job,
                'country_job_duration' => $request->country_job_duration,
                'same_germany_job' => $request->same_germany_job,
                'germany_job_duration' => $request->germany_job_duration,
                'available_certificate' => $request->available_certificate,
                'available_translation' => $request->available_translation,
                'applied_application' => $request->applied_application,
                'equivalence_assessment' => $request->equivalence_assessment,
                'equivalence_assessment_date' => $request->equivalence_assessment_date,
                'evaluation_result' => $request->evaluation_result,
                'evaluation_date' => $request->evaluation_date,
        ]);
    
    }


    public function editJob($id)
    {
        $job = ClientJobSituation::findOrFail($id);
        return view('editClient.clientJob', compact('job'));
    }
    public function updateJob(Request $request, $id)
    {
        
        $job = ClientJobSituation::findOrFail($id);

        
        $job->update([
            
            'employment_status' => $request->employment_status,
                'employment_type' => $request->employment_type,
                'funding_source' => $request->funding_source,
                'residence_status' => $request->residence_status,
        ]);
    
    }


    public function editLanguageSkills($id)
    {
        $language = ClientLanguageSkill::findOrFail($id);
        return view('editClient.clientLanguageSkill', compact('language'));
    }
    public function updateLanguageSkills(Request $request, $id)
    {
        
        $language = ClientLanguageSkill::findOrFail($id);

        
        $language->update([
            'german_skill' => $request->german_skills,
            'german_certificate' => $request->german_certificate,
            'german_level' => $request->german_level,
        ]);
    
    }
}


