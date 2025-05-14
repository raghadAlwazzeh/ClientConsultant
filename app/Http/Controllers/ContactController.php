<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
}
