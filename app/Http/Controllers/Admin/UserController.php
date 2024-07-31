<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => 'required',
        ], [], [
            'name' => "Ad Soyad",
            'email' => "E-posta",
            'password' => "Şifre"
        ])->validate();

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->start_time = now();
        $user->end_time = now()->addDays(30);
        $user->password = Hash::make($request->input('password'));

        if ($user->save()){
            $place = new Place();
            $place->name = uniqid(5).". Mekan";
            $place->slug = Str::slug( $place->name);
            $place->is_default = 1;
            $place->user_id = $user->id;
            $place->save();
            $place->createWorkTimes();
            return back()->with('response', [
                'status' => "success",
                'message' => "Kullanıcı Oluşturuldu"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Request $request)
    {
        $user->status = $request->statusCode;
        if ($user->save()){
            return response()->json([
                'status' => "success",
                'message' => "Talep Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => "required",
        ], [], [
            'name' => "Ad Soyad",
        ]);

        $user->name = $request->input('name');
        if ($user->email != $request->input('email')){
            $request->validate([
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
            ], [], [
                'email' => "E-posta",
            ]);
            $user->email = $request->input('email');
        }
        $user->phone = $request->input('phone');
        if ($request->filled('password')){
            $user->password = Hash::make($request->input('password'));
        }

        if ($user->save()){
            return to_route('admin.user.index')->with('response', [
                'status' => "success",
                'message' => "Kullanıcı Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = User::orderBy('status', 'asc')->latest();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'User', '', 'orderChecks');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('name', function ($q) {
                return Str::limit($q->name, 20);
            })
            ->editColumn('phone', function ($q) {
                return createPhone($q->phone, formatPhone($q->phone));
            })
            ->editColumn('status', function ($q) {
                return $q->advertStatus('icon');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Detay",
                        'buttonLink' => route('admin.user.edit', $q->id),
                        'id' => 0,
                    ],
                    [
                        'buttonText' => "Aktif",
                        'buttonLink' => null,
                        'id' => 1,
                    ],
                    [
                        'buttonText' => "Pasif",
                        'buttonLink' => null,
                        'id' => 0,
                    ],
                ];
                $html.= create_dropdown_button($buttons, $q->id, 'updateStatus');

                return $html;
            })
            ->rawColumns(['id', 'action', 'name', 'status', 'phone'])
            ->make(true);

    }
}
