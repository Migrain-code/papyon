<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Models\PartnershipRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ContactRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contact.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'mail' => "required",
            'phone' => "required",
            'subject' => "required",
            'message' => "required",
        ], [], [
            'name' => "Ad Soyad",
            'mail' => "E-posta",
            'phone' => "Telefon",
            'subject' => "Konu",
            'message' => "Mesaj",
        ]);
        $contact = new ContactRequest();
        $contact->name = $request->input('name');
        $contact->mail = $request->input('mail');
        $contact->phone = $request->input('phone');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        if ($contact->save()){
            return back()->with('response', [
                'status' => "success",
                'message' => "Talep Oluşturuldu"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactRequest $contact, Request $request)
    {
        $contact->status = $request->statusCode;
        if ($contact->save()){
            return response()->json([
                'status' => "success",
                'message' => "Talep Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactRequest $contact)
    {
        return view('admin.contact.edit.index', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactRequest $contact)
    {
        $request->validate([
            'name' => "required",
            'mail' => "required",
            'phone' => "required",
            'subject' => "required",
            'message' => "required",
        ], [], [
            'name' => "Ad Soyad",
            'mail' => "E-posta",
            'phone' => "Telefon",
            'subject' => "Konu",
            'message' => "Mesaj",
        ]);

        $contact->name = $request->input('name');
        $contact->mail = $request->input('mail');
        $contact->phone = $request->input('phone');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        if ($contact->save()){
            return to_route('admin.contact.index')->with('response', [
                'status' => "success",
                'message' => "Talep Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = ContactRequest::orderBy('status', 'asc')->latest();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ContactRequest', '', 'orderChecks');
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
                        'buttonLink' => route('admin.contact.edit', $q->id),
                        'id' => 0,
                    ],
                    [
                        'buttonText' => "Arandı",
                        'buttonLink' => null,
                        'id' => 1,
                    ],
                    [
                        'buttonText' => "Aranmadı",
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
