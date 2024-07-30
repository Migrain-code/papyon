<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Package;
use App\Models\PackagePropartie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.package.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        $permissions = Permission::all();
        return view('admin.package.edit.index', compact('package', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $price = $request->input('price');
        $yearPrice = $price - (($price * 20) /100);
        $package->name = $request->input('title');
        $package->slug = Str::slug($package->name);
        $package->price = $price;
        $package->year_price = $yearPrice;
        $package->total_price = $yearPrice * 12;
        if ($request->hasFile('icon')){
            $package->icon = $request->file('icon')->store('packageIcons');
        }
        if ($package->save()){

            $package->proparties()->delete();
            foreach ($request->input('group-a') as $row){
                $packageProparty = new PackagePropartie();
                $packageProparty->package_id = $package->id;
                $packageProparty->name = $row["proparty_name"];
                $packageProparty->order_number = $row["proparty_order_number"];
                $packageProparty->price = $row["proparty_price"];
                $packageProparty->permission_id = $row["permission_id"];
                $packageProparty->save();
            }
            return back()->with('response', [
               'status' => "success",
               'message' => "Paket Bilgileri Güncellendi"
            ]);
        }

    }

    public function datatable()
    {
        $adverts = Package::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return $q->id;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('name', function ($q) {
                return Str::limit($q->name, 20);
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('admin.package.edit', $q->id),
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
