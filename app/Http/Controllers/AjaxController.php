<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Toplu Silme
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function allDelete(Request $request)
    {
        foreach ($request->deletedKeys as $id){
            $query = $request->model::find($id);
            if ($query){
                $query->delete();
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => "Seçtiğiniz Kayıtlar Başarılı Bir Şekilde Silindi",
        ]);
    }
}
