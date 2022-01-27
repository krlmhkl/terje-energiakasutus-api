<?php

namespace App\Http\Controllers;

use App\Models\Energia;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function show(){
        return Energia::all();
    }
    public function groupBy(){
        $monthlyData = Energia::get()->groupBy(function($data) {
            return $data->startDate->format('Y-m-d');
    }
};
