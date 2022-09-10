<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Store;

class WebController extends Controller
{
    public function menu($storeId) {
        $store = Store::find($storeId);
        if ($store == null){
            return view('web.menu');
        }

        $menu = $store->menu();
        return view('web.menu', ['menu' => $menu, 'store' => $store]);
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
