<?php

namespace App\Http\Controllers;

use App\Models\Energia;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function show(){
        return Energia::all();
    }

}
