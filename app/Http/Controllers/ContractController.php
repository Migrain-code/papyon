<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ContractController extends Controller
{
    private $business;
    private $user;

    private $titles = ["Kullanıcı sözleşmesi ve gizlilik", "Kişisel verilerin korunması", "Teslimat ve iade koşulları", "Mesafeli satış sözleşmesi"];
    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
        if ($this->business->contracts->count() == 0){
            foreach ($this->titles as $title){
                $contract = new Contract();
                $contract->place_id = $this->business->id;
                $contract->title = $title;
                $contract->slug = Str::slug($title);
                $contract->description = $title;
                $contract->save();
            }
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('business.contract.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract, Request $request)
    {
        $contract->status = $request->statusCode;
        if ($contract->save()){
            return response()->json([
                'status' => "success",
                'message' => "Sözleşme Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        return view('business.contract.edit.index', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'title' => 'required',
            'editorContent' => 'required',
        ], [
            'title' => 'Başlık',
            'editorContent' => 'Açıklama',
        ]);
        $contract->title = $request->input('title');
        $contract->description = $request->input('editorContent');
        if ($contract->save()){
            return to_route('business.contract.index')->with('response',[
                'status' => "success",
                'message' => "Sözleşme Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        static $looper = 0;
        $adverts = $this->business->contracts;
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) use (&$looper) {
                $looper++;
                return $looper;
            })
            ->editColumn('description', function ($q) {
                return Str::limit(strip_tags($q->description), 50);
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
                        'buttonLink' => route('business.contract.edit', $q->id),
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
