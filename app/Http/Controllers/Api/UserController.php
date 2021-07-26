<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
// ho comentato l'index xche non ho capito tanto il metodo 'with' in postman mi dava errore

// dopo vari tentativi era  la parola type sbagliata cioe non faceva colegamento /relazione

    public function index()
    {
        $users = User::with("types")->get();

        return response()->json([
            'results' => $users
        ]);
    }

    // questa funzione mi restituisce solo  gli users corettamente

    // public function index()
    // {
    //     $users = User::all();

    //     return response()->json([
    //         'results' => $users
    //     ]);
    // }
}
