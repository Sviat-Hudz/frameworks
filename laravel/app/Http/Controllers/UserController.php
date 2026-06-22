<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['status' => 'GET']);
    }

    public function store(Request $request)
    {
        return response()->json(['status' => 'POST'], 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json(['status' => "PATCH $id"]);
    }

    public function destroy($id)
    {
        return response()->json(['status' => "DELETE $id"]);
    }
}
