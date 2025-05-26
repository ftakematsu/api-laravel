<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request) {
        $resource = Item::create([
            'name' => $request->get('name'),
            'value' => $request->get('value')
        ]);
        return response()->json($resource);
    }

    public function getAll() {
        $resource = Item::get();
        return response()->json($resource);
    }
}
