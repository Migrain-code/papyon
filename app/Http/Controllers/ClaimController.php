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
        $orders = $this->business->orders()->where('order_type', 0)->get();
        return view('business.claim.packet.index', compact('orders', 'claims'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Claim $claim)
    {
        //
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
        $claims = Claim::where('type_id', $request->typeId)->latest();
        return DataTables::of($claims)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Claim', 'Müşterileri');
            })
            ->editColumn('name', function ($q) {
                return createName(route('business.claim.edit', $q->id), $q->name);
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
                $html .= create_edit_button(route('business.claim.edit', $q->id));
                $html .= create_delete_button('Claim', $q->id, 'Talep', 'Talep Kaydını Silmek İstediğinize Eminmisiniz? Kayıt Sadece İşletmenizden Silinecektir');

                return $html;
            })
            ->rawColumns(['id', 'action', 'name', 'status'])
            ->make(true);

    }
}
