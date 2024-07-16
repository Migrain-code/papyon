<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SuggestionController extends Controller
{
    private $business;
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('business.suggestion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suggestion $suggestion, Request $request)
    {
        $suggestion->status = $request->statusCode;
        if ($suggestion->save()){
            return response()->json([
                'status' => "success",
                'message' => "Yorum Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suggestion $suggestion)
    {
        return view('business.suggestion.edit.index', compact('suggestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        $request->validate([
            'title' => 'required',
            'editorContent' => 'required',
        ], [
            'title' => 'Başlık',
            'editorContent' => 'Açıklama',
        ]);
        $suggestion->title = $request->input('title');
        $suggestion->description = $request->input('editorContent');
        if ($suggestion->save()){
            return to_route('business.suggestion.index')->with('response',[
                'status' => "success",
                'message' => "Yorum Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        static $looper = 0;
        $adverts = $this->business->suggestions;
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) use (&$looper) {
                $looper++;
                return $looper;
            })
            ->editColumn('table_id', function ($q) {
                return $q->table->name;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('comment', function ($q) {
                return Str::limit($q->comment, 20);
            })
            ->addColumn('status', function ($q) {
                return $q->status('icon');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('business.suggestion.edit', $q->id),
                        'id' => 0,
                    ],
                    [
                        'buttonText' => "Yayınla",
                        'buttonLink' => null,
                        'id' => 1,
                    ],
                    [
                        'buttonText' => "Yayından Kaldır",
                        'buttonLink' => null,
                        'id' => 0,
                    ],
                ];
                $html.= create_dropdown_button($buttons, $q->id, 'updateStatus');

                return $html;
            })
            ->rawColumns(['id', 'action', 'name', 'status'])
            ->make(true);

    }
}
