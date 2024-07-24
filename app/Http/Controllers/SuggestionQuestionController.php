<?php

namespace App\Http\Controllers;

use App\Models\SuggestionQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SuggestionQuestionController extends Controller
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
        return view('business.suggestion-question.index');
    }

    public function store(Request $request)
    {
        $suggestionQuestion = new SuggestionQuestion();
        $suggestionQuestion->place_id = $this->business->id;
        $suggestionQuestion->question = $request->input('title');
        if ($suggestionQuestion->save()){
            return to_route('business.suggestion-question.index')->with('response',[
                'status' => "success",
                'message' => "Soru Eklendi"
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(SuggestionQuestion $suggestionQuestion, Request $request)
    {
        $suggestionQuestion->status = $request->statusCode;
        if ($suggestionQuestion->save()){
            return response()->json([
                'status' => "success",
                'message' => "Soru Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuggestionQuestion $suggestionQuestion)
    {
        return view('business.suggestion-question.edit.index', compact('suggestionQuestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuggestionQuestion $suggestionQuestion)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'title' => 'Başlık',
        ]);
        $suggestionQuestion->question = $request->input('title');
        if ($suggestionQuestion->save()){
            return to_route('business.suggestion-question.index')->with('response',[
                'status' => "success",
                'message' => "Soru Güncellendi"
            ]);
        }
    }

    public function datatable()
    {

        $adverts = $this->business->suggestionQuestions;
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Announcement', 'Duyurları', 'orderChecks');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->addColumn('status', function ($q) {
                return $q->status('icon');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('business.suggestion-question.edit', $q->id),
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
