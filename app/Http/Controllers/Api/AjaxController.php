<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AjaxController extends Controller
{
    public function checkSlug(Request $request)
    {
        $name = $request->input('name');
        $slug = Str::slug($name);

        $existPlace = Place::where('slug', $slug)->exists();

        if($existPlace){
            return response()->json([
               'status' => "error",
               'message' => "Bu mekan linki başka bir mekan tarafından kullanıyor. Lütfen Başka Bir Link Deneyiniz.",
            ]);
        } else{
            return response()->json([
                'status' => "success",
                'message' => "Bu mekan linki kullanılabilir.",
                'link' => $slug,
            ]);
        }
    }
}
