<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index()
{
    $users = [
    'Joel',
    'Ellie',
    'Tess',
    //...
];

return view('users', [
    'users' => $users
]);
}
}
