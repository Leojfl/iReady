<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function storeImage($image, $name, $id)
    {
        $image_path_name = $name.'_'. time() . '_' . $image->getClientOriginalName();
        Storage::disk('public')
        ->put($image_path_name, File::get($image));
        return 'uploads/' . $image_path_name;
    }

}
