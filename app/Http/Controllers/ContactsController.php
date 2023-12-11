<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    /**
     * Request: requisição, representa o JSON
     */
    public function create(Request $request) {
        $contact = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'user_id' => auth()->user()->id // Pega o ID do usuário autenticado
        ]);
        return response()->json($contact);
    }

    public function getAll(Request $request) {
        $contacts = Contact::where('user_id', auth()->user()->id)->get();
        return response()->json($contacts);
    }

    public function remove($id) {
        // Busca um registro pelo seu ID
        $contact = Contact::find($id);
        $contact->delete();
    }

    public function get($id) {
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function edit($id, Request $request) {
        $contact = Contact::where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'phone' => $request->phone
                    ]);
        return response()->json($contact);
    }


}
