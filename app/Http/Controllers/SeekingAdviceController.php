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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class SeekingAdviceController extends Controller
{
    public function createNewClient(Request $request)
    {
        
        Session::put('client', [
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
        return redirect("/newclient/schooleducation");
    }

    public function clientSchoolEducation($id = null){
        return view('createNewClient.schoolCertificate', compact('id'));
    }

    public function createClientSchoolEducation(Request $request, $id = null){
        if($id){
            ClientSchoolEducation::create([
                'client_id' => $id,
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
            return redirect(route('clients.showqualification', $id));
        }
        else{
            Session::put('school_data', [
            'school_country' => $request->school_country,
            'school_study_duration' => $request->school_study_duration,
            'school_graduation_year' => $request->school_graduation_year,
            'qualification_level' => $request->qualification_level,
            'school_institution' => $request->school_institution,
            'school_location' => $request->school_location,
            'school_study_titel' => $request->school_study_titel,
            'school_german_translate' => $request->school_german_translate,
            'school_available_certificate' => $request->school_available_certificate,
            'school_available_translation' => $request->school_available_translation,
        ]);
            return redirect("/newclient/training");
        }
     
    }

    public function clientTraining($id = null){
        return view('createNewClient.clientTraining', compact('id'));
    }

    public function createClientTraining(Request $request, $id = null){
        if($id){
            ClientTraining::create([
                'client_id' => $id,
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
            return redirect(route('clients.showqualification', $id));
        }
        else{
            Session::put('training_data', [
            'training_country' => $request->training_country,
            'training_duration' => $request->training_duration,
            'training_completion_year' => $request->training_completion_year,
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
        return redirect("/newclient/universitydegree");  
        }
        
    }

    public function clientUniversityDegree($id = null){
        return view('createNewClient.clientUniversityDegree', compact('id'));
    }

    public function createClientUniversityDegree(Request $request, $id = null)
    {
        if($id){
            ClientUniversityDegree::create([
                'client_id'=> $id,
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
            return redirect(route('clients.showqualification', $id));
        }
     else{
        Session::put('client_study', [
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
        return redirect("/newclient/jobsituation");}
    }
    public function createClientJobSituation(Request $request)
    {
     
        Session::put('employment_data', [
            'employment_status' => $request->employment_status,
            'employment_type' => $request->employment_type,
            'funding_source' => $request->funding_source,
            'kundennummer' => $request->kundennummer,
            'residence_status' => $request->residence_status,
        ]);
        return redirect("/newclient/languageskills");
    }

    public function createClientLanguageSkill(Request $request)
    {
     
        Session::put('german_skills', [
            'german_skill' => $request->german_skills,
            'german_certificate' => $request->german_certificate,
            'german_level' => $request->german_level,
        ]);
        //return Session::all();
        return $this->storeClientData();
    }
    public function storeClientData(){
        //return Session::all();
        $advisorId = Auth::id();
        if (Session::has('client')) {
            $clientData = Session::get('client');
            $client = Client::create([
                'user_id' => $advisorId,
                'ort' => $clientData['ort'],
                'landkreis' => $clientData['landkreis'],
                'data_protection' => $clientData['data_protection'],
                'education' => $clientData['education'],
                'unknown_advice' => $clientData['unknown_advice'],
                'advisor' => $clientData['advisor'],
                'another_advisor' => $clientData['another_advisor'],
                'recognation_person' => $clientData['recognation_person'],
                'another_recognation_person' => $clientData['another_recognation_person'],
                'first_name' => $clientData['first_name'],
                'last_name' => $clientData['last_name'],
                'street' => $clientData['street'],
                'address' => $clientData['address'],
                'zip_code' => $clientData['zip_code'],
                'city' => $clientData['city'],
                'phone' => $clientData['phone'],
                'email' => $clientData['email'],
                'germany_residence' => $clientData['germany_residence'],
                'state' => $clientData['state'],
                'residence' => $clientData['residence'],
                'gender' => $clientData['gender'],
                'country' => $clientData['country'],
                'birth_date' => $clientData['birth_date'],
                'first_nationality' => $clientData['first_nationality'],
                'second_nationality' => $clientData['second_nationality'],
                'reise_date' => $clientData['reise_date'],
                'job' => $clientData['job'],
                'has_previous_application' => $clientData['has_previous_application'],
                'previous_advisory_institution' => $clientData['previous_advisory_institution'],
                'result' => $clientData['result'],
                'rating' => $clientData['rating'],]
        );
        Session::forget('client');
        }
        if (Session::has('school_data')  && collect(Session::get('school_data'))->filter()->isNotEmpty()) {
            $schoolData = Session::get('school_data' );
            $schoolEducation = ClientSchoolEducation::create([
                'client_id' => $client->id,
                'school_country' => $schoolData['school_country'],
                'school_study_duration' => $schoolData['school_study_duration'],
                'school_graduation_year' => $schoolData['school_graduation_year'],
                'qualification_level' => $schoolData['qualification_level'],
                'school_institution' => $schoolData['school_institution'],
                'school_location' => $schoolData['school_location'],
                'school_study_titel' => $schoolData['school_study_titel'],
                'school_german_translate' => $schoolData['school_german_translate'],
                'school_available_certificate' => $schoolData['school_available_certificate'],
                'school_available_translation' => $schoolData['school_available_translation'],]);
                Session::forget('school_data');
        }
        if (Session::has('training_data')  && collect(Session::get('training_data'))->filter()->isNotEmpty()) {
            
            $trainingData = Session::get('training_data');
            $training = ClientTraining::create([
                'client_id' => $client->id,
                'training_country' => $trainingData['training_country'],
                'training_duration' => $trainingData['training_duration'],
                'training_completion_year' => $trainingData['training_completion_year'],
                'training_institution' => $trainingData['training_institution'],
                'training_location' => $trainingData['training_location'],
                'training_titel' => $trainingData['training_titel'],
                'training_german_translate' => $trainingData['training_german_translate'],
                'refernce_job' => $trainingData['refernce_job'],
                'another_refernce_job' => $trainingData['another_refernce_job'],
                'regulated' => $trainingData['regulated'],
                'country_regulated' => $trainingData['country_regulated'],
                'same_country_job' => $trainingData['same_country_job'],
                'country_job_duration' => $trainingData['country_job_duration'],
                'same_germany_job' => $trainingData['same_germany_job'],
                'germany_job_duration' => $trainingData['germany_job_duration'],
                'available_certificate' => $trainingData['available_certificate'],
                'available_translation' => $trainingData['available_translation'],
                'applied_application' => $trainingData['applied_application'],
                'equivalence_assessment' => $trainingData['equivalence_assessment'],
                'equivalence_assessment_date' => $trainingData['equivalence_assessment_date'],
                'evaluation_result' => $trainingData['evaluation_result'],
                'evaluation_date' => $trainingData['evaluation_date'],]);
                Session::forget('training_data');
        }


        if (Session::has('client_study')  && collect(Session::get('client_study'))->filter()->isNotEmpty()) {
            $studyData = Session::get('client_study');
            $clientStudy = ClientUniversityDegree::create([
                'client_id' => $client->id,
                'country' => $studyData['country'],
                'study_duration' => $studyData['study_duration'],
                'graduation_year' => $studyData['graduation_year'],
                'study_institution' => $studyData['study_institution'],
                'study_location' => $studyData['study_location'],
                'study_titel' => $studyData['study_titel'],
                'study_german_translate' => $studyData['study_german_translate'],
                'refernce_job' => $studyData['refernce_job'],
                'another_refernce_job' => $studyData['another_refernce_job'],
                'regulated' => $studyData['regulated'],
                'country_regulated' => $studyData['country_regulated'],
                'same_country_job' => $studyData['same_country_job'],
                'country_job_duration' => $studyData['country_job_duration'],
                'same_germany_job' => $studyData['same_germany_job'],
                'germany_job_duration' => $studyData['germany_job_duration'],
                'available_certificate' => $studyData['available_certificate'],
                'available_translation' => $studyData['available_translation'],
                'applied_application' => $studyData['applied_application'],
                'equivalence_assessment' => $studyData['equivalence_assessment'],
                'equivalence_assessment_date' => $studyData['equivalence_assessment_date'],
                'evaluation_result' => $studyData['evaluation_result'],
                'evaluation_date' => $studyData['evaluation_date'],]);
                Session::forget('client_study');
        }

        if (Session::has('employment_data')) {
            $employmentData = Session::get('employment_data');
            $employment = ClientJobSituation::create([
                'client_id' => $client->id,
                'employment_status' => $employmentData['employment_status'],
                'employment_type' => $employmentData['employment_type'],
                'funding_source' => $employmentData['funding_source'],
                'kundennummer' => $employmentData['kundennummer'],
                'residence_status' => $employmentData['residence_status'],]);
                Session::forget('employment_data');
        }

        if (Session::has('german_skills')) {
            $languageData = Session::get('german_skills');
            $languageSkill = ClientLanguageSkill::create([
                'client_id' => $client->id,
                'german_skill' => $languageData['german_skill'],
                'german_certificate' => $languageData['german_certificate'],
                'german_level' => $languageData['german_level'],]);
                Session::forget('german_skills');
        }

        return redirect('/clients/'. $client->id);

    }


    public function showClients(Request $request)
    {
        $search = $request->input('search');
        $clients = Client::when($search, function ($q) use ($search) {
            return $q->where('last_name', 'LIKE', "%{$search}%")
                    ->orWhere('first_name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhereHas('consultant', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
        })->paginate(15);

        return view('index', compact('clients'));
        //$clients = Client::with('consultant')->paginate(15); // Paginate with 15 clients per page
        //return view('index', compact('clients'));
    
    }

    public function showClientInformation($id){
        $client = Client::findOrFail($id);
        return view('showClientInfo', compact('client'));
    }
    public function showClientQualification($id){
        $client = Client::findOrFail($id);
       // return ($client->languageSkill);
        return view('showClientQualification', compact('client'));
    }

    
}
