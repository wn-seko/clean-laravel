<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class RootController extends Controller
{
    public function index()
    {
        $result = [
            'health_check' => true
        ];

        return response()->json($result, 200);
    }
}
