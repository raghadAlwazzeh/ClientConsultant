<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientDocument;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function addDocument(Client $client){
        return view('documents.addClientDocument', compact('client'));
    }
    public function uploadDocument(Request $request){
        
        $path = $request->file('file')->store('clients', 'public');
        ClientDocument::create([
            'client_id'=>$request->client,
            'title'=>$request->title,
            'category'=>$request->category,
            'document_path'=>$path,
        ]);
        return (back());
    }
    public function showClientDocument(Client $client){
        return view('documents.clientDocument', compact('client'));
    }
    public function addDocumentBOP(){
        return view('documents.addDocumentBOP');
    }
    public function showDocumentBOP(Request $request){
        $search = $request->input('search');
        $documents = ClientDocument::when($search, function ($q) use ($search) {
            return $q->whereHas('client', function ($q) use ($search) {
                $q->where('first_name', 'LIKE', "%{$search}%");
            })
                    ->orWhereHas('client', function ($q) use ($search) {
                        $q->where('last_name', 'LIKE', "%{$search}%");
                    })
                    ->orwhereHas('client', function ($q) use ($search) {
                        $q->where('id', 'LIKE', "%{$search}%");
                    })
                    ->orWhere('title', 'LIKE', "%{$search}%")
                    ->orWhere('category', 'LIKE', "%{$search}%");
        })->whereNotNull('document_path')
        ->paginate(15);
        //$documents = ClientDocument::paginate(15);
        return view('documents.showDocumentBOP', compact('documents'));
    }
    public function addDocumentBOU(){
        return view('documents.addDocumentBOU');
    }
    public function uploadDocumentBOU(Request $request){
        
        ClientDocument::create([
            'description'=>$request->description,
            'indication'=>$request->indication,
            'document_url'=>$request->document_url,
        ]);
        return (back());
    }
    public function showDocumentBOU(Request $request){
        $search = $request->input('search');
        $documents = ClientDocument::when($search, function ($q) use ($search) {
            return $q->Where('indication', 'LIKE', "%{$search}%");
        })->whereNotNull('document_url')
        ->paginate(15);
        //$documents = ClientDocument::paginate(15);
        return view('documents.showDocumentBOU', compact('documents'));
    }
}
