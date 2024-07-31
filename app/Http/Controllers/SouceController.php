<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Souce;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SouceController extends Controller
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
        $menu = $this->business->activeMenu();
        return view('business.souces.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'title' => 'Sos Adı',
        ]);
        $souce = new Souce();
        $souce->place_id = $this->business->id;
        $souce->name = $request->input('title');
        if ($souce->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Sos Eklendi"
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Souce $souce, Request $request)
    {
        $souce->status = $request->statusCode;
        if ($souce->save()){
            return response()->json([
                'status' => "success",
                'message' => "Sos Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Souce $souce)
    {
        return view('business.souces.edit.index', compact('souce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Souce $souce)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'title' => 'Başlık',

        ]);
        $souce->name = $request->input('title');
        if ($souce->save()){
            return to_route('business.souce.index')->with('response',[
                'status' => "success",
                'message' => "Sos Bilgisi Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = $this->business->souces;
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Souce', 'Duyurları', 'orderChecks');
            })
            ->editColumn('description', function ($q) {
                return Str::limit($q->description, 50);
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('title', function ($q) {
                return Str::limit($q->title, 20);
            })
            ->addColumn('status', function ($q) {
                return $q->advertStatus('icon');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('business.souce.edit', $q->id),
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
