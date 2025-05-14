<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\SessionProtocol;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdvisorController extends Controller
{
    public function conversationProtocol ($id){
        $client= Client::findOrFail($id);
        return view('advisor.showAllConversationProtocol', compact('client'));
    }
    public function showConversationProtocol ($id){
        $conversation= SessionProtocol::findOrFail($id);
        return view('advisor.showConversationProtocol', compact('conversation'));
    }
    public function addConversationProtocol ($id){
        $client= Client::findOrFail($id);
        return view('advisor.conversationProtocol', compact('client'));
    }
    public function storeConversationProtocol(Request $request, $id)
    {
    $validated = $request->validate([
        'subject' => 'nullable|string|max:255',
        'contact_type' => 'required|in:first_consultation,follow_up_consultation,other',
        'consultation_date' => 'nullable|date',
        'advice_seeker' => 'required|string|max:255',
        'another_advice_seeker' => 'nullable|string|max:255',
        'consultation_type' => 'required|string|max:255',
        'duration' => 'required|string|max:255',
        'another_help_system' => 'nullable|string|max:255',
        'anerkennend_help' => 'nullable|string|max:255',
        'iq_help' => 'nullable|string|max:255',
        'another_advisor_help' => 'nullable|string|max:255',
        'other_help' => 'nullable|string|max:255',
        'consultation_language' => 'required|string|max:255',
        'interpreter' => 'in:yes,no',
        'data_processing_consent' => 'nullable|boolean',
        'survey_contact_consent' => 'nullable|boolean',
        'notes_and_agreements' => 'nullable|string',
        'task_date' => 'nullable|date',
        'task_subject' => 'nullable|string|max:255',
        'scheduled_task' => 'nullable|string',
    ]);
    $advisorId = Auth::id();
    $protocol = SessionProtocol::create([
        'client_id' => $id,
        'user_id' => $advisorId,
        'subject' => $request->subject,
        'contact_type' => $request->contact_type,
        'consultation_date' => $request->consultation_date,
        'advice_seeker' => $request->advice_seeker,
        'another_advice_seeker' => $request->another_advisor,
        'consultation_type' => $request->consultation_type,
        'duration' => $request->duration,
        'another_help_system' => $request->another_help_system,
        'anerkennend_help' => $request->anerkennend_help,
        'iq_help' => $request->iq_help,
        'another_advisor_help' => $request->another_advisor_help,
        'other_help' => $request->other_help,
        'consultation_language' => $request->consultation_language,
        'interpreter' => $request->interpreter,
        'data_processing_consent' => $request->has('data_processing_consent'),
        'survey_contact_consent' => $request->has('survey_contact_consent'),
        'notes_and_agreements' => $request->notes_and_agreements,
        'task_date' => $request->task_date,
        'task_subject' => $request->task_subject,
        'scheduled_task' => $request->scheduled_task,

    ]);
    
    return redirect( route('conversationprotocol.showall', $id));
}

}
