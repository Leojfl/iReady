<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function menu($storeName) {
        return view('web.menu');
    }

    public function chart()
    {
        $data = [8, 5, 3, 5, 2, 3, 10];
        $labels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'];

        return response()->json([
            'data' => $data,
            'labels' => $labels
         ]);
    }

}
