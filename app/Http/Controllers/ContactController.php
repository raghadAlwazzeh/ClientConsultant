<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Corporation;
use App\Models\NetworkPartner;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContactPerson(){
        $users= User::whereHas('role', function ($query) {
            $query->where('name', 'admin');
        })->paginate(15);
        return view('contactInfo.contactPerson', compact('users'));
    }

    public function showNetworkPartner(Request $request){
        $search = $request->input('search');
        $partners = NetworkPartner::when($search, function ($q) use ($search) {
            return $q->Where('name', 'LIKE', "%{$search}%")
                        ->orWhere('zip_code', 'LIKE', "%{$search}%")
                        ->orWhere('field', 'LIKE', "%{$search}%")
                        ->orWhere('type', 'LIKE', "%{$search}%");
        })->paginate(15);
        return view('contactInfo.showNetworkPartner', compact('partners'));
    }
    public function addNetworkPartner(){
        return view('contactInfo.addNetworkPartner');
    }
    public function storeNetworkPartner(Request $request){
        NetworkPartner::create([
            'name' => $request->name,
            'type' => $request->type,
            'field' => $request->field,
            'zip_code' => $request->zip_code,
            'location' => $request->location,
            'phone' => $request->phone,
            'email' => $request->email,
            'vacancies' => $request->vacancies,
        ]);
        return redirect('/networkpartner/show');
    }
    public function addCorporation(){
        return view('contactInfo.addCorporation');
    }

    public function storeCorporation(Request $request){
        Corporation::create([
        'event_date'        => $request->event_date,
        'district'          => $request->district,
        'event_type'        => $request->event_type,
        'event_other'       => $request->event_other ?? null,
        'activity_type'     => $request->activity_type,
        'aqb_actors'        => $request->aqb_actors,
        'external_actors'   => $request->external_actors,
        'actor_type'        => $request->actor_type,
        'actor_type_other'  => $request->actor_type_other ?? null,
        'short_title'       => $request->short_title ?? null,
        'location'          => $request->location ?? null,
        'notes'             => $request->notes ?? null,
    ]);
        return redirect('/cooporation/show');
    }
    public function showcooporation(Request $request){
        $search = $request->input('search');
        $corporations = Corporation::when($search, function ($q) use ($search) {
            return $q->Where('short_title', 'LIKE', "%{$search}%");
        })->paginate(15);
        return view('contactInfo.showCorporation', compact('corporations'));
    }

}
