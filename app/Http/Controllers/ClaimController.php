<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClaimController extends Controller
{
    private $business;
    private $user;
    private $claims;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
        $this->claims = $this->business->totalClaims();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders =  $this->business->orders;
        $claims = $this->claims;
        return view('business.claim.index', compact('orders', 'claims'));
    }

    public function taxi()
    {
        $claims = $this->claims;
        return view('business.claim.taxi.index', compact('claims'));
    }
    public function vale()
    {
        $claims = $this->claims;
        return view('business.claim.vale.index', compact('claims'));
    }
    public function waiter()
    {
        $claims = $this->claims;
        return view('business.claim.waiter.index', compact('claims'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function packet()
    {
        $claims = $this->claims;

        return view('business.claim.packet.index', compact( 'claims'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update Claim Status
     */
    public function show(Claim $claim, Request $request)
    {
        $claim->status = $request->statusCode;
        if ($claim->save()){
            return response()->json([
               'status' => "success",
               'message' => "Talep Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Claim $claim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Claim $claim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Claim $claim)
    {
        //
    }

    public function datatable(Request $request)
    {
        $claims = Claim::where('type_id', $request->typeId)->latest('created_at');
        return DataTables::of($claims)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Claim', 'Siparişler', 'orderChecks');
            })
            ->editColumn('name', function ($q) {
                if (isset($q->table_id)){
                    return createName(route('business.claim.edit', $q->id), $q->table->name);
                } else{
                    return createName(route('business.claim.edit', $q->id), $q->name);
                }

            })
            ->editColumn('phone', function ($q) {
                return createPhone($q->phone, formatPhone($q->phone));
            })
            ->editColumn('table_id', function ($q) {
                return $q->table->name;
            })
            ->editColumn('status', function ($q) {
                return $q->status('icon');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                //$html .= create_edit_button(route('business.claim.edit', $q->id));
                $buttons = [
                   [
                         'buttonText' => "Onayla",
                         'buttonLink' => null,
                         'id' => 1,
                   ],
                   [
                        'buttonText' => "İptal Et",
                        'buttonLink' => null,
                        'id' => 2,
                   ],
                   [
                        'buttonText' => "Tamamla",
                        'buttonLink' => null,
                        'id' => 3,
                   ],
                ];
                $html.= create_dropdown_button($buttons, $q->id, 'updateStatus');

                return $html;
            })
            ->rawColumns(['id', 'action', 'name', 'status'])
            ->make(true);

    }
}
