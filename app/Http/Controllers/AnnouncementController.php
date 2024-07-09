<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\SwiperAdvert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AnnouncementController extends Controller
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
        return view('business.announcement.index');
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
            'description' => 'required',
        ], [
            'title' => 'Başlık',
            'description' => 'Açıklama',
        ]);
        $announcement = new Announcement();
        $announcement->place_id = $this->business->id;
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        if ($announcement->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Duyuru Oluşturuldu"
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement, Request $request)
    {
        $announcement->status = $request->statusCode;
        if ($announcement->save()){
            return response()->json([
                'status' => "success",
                'message' => "Duyuru Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view('business.announcement.edit.index', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
           'title' => 'required',
           'description' => 'required',
        ], [
            'title' => 'Başlık',
            'description' => 'Açıklama',
        ]);
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        if ($announcement->save()){
            return to_route('business.announcement.index')->with('response',[
                'status' => "success",
                'message' => "Duyuru Güncellendi"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }

    public function datatable()
    {
        $adverts = Announcement::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Announcement', 'Duyurları', 'orderChecks');
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
                        'buttonLink' => route('business.announcement.edit', $q->id),
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
