<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private const USERS = [
        ['id' => 1, 'name' => 'Святослав', 'email' => 'sviat@example.com'],
        ['id' => 2, 'name' => 'Іван', 'email' => 'ivan@example.com'],
    ];

    public function index()
    {
        return response()->json(self::USERS);
    }

    public function show($id)
    {
        $user = array_filter(self::USERS, fn($u) => $u['id'] == $id);
        $foundUser = reset($user);

        return response()->json($foundUser ?: ['message' => 'Not found'], $foundUser ? 200 : 404);
    }

    public function store(Request $request)
    {
        return response()->json(['status' => 'created', 'data' => $request->all()], 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json(['status' => "updated $id", 'data' => $request->all()]);
    }

    public function destroy($id)
    {
        return response()->json(['status' => "deleted $id"], 200);
    }
}
