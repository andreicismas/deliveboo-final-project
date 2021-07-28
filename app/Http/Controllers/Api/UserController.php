<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with("types")->get();

        foreach ($users as $user) {
            $user->link = route("orders.create", ["slug" => $user->slug]);
            // $user->cover_url = $user->cover_url ? asset('storage/' . $user->cover_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
        }

        return response()->json([
            'success' => true,
            'results' => $users
        ]);
    }
}
