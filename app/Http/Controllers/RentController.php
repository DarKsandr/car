<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function rent()
    {
        $users = User::all();
        $cars = Car::all();

        return view('rent', compact('users', 'cars'));
    }
}
