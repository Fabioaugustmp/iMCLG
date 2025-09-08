<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billings = Billing::with('property')->get();
        return view('billing.index', compact('billings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Properties::all();
        return view('billing.create', compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'title' => 'required',
            'description' => 'required',
            'value' => 'required|numeric',
            'expiration_date' => 'required|date',
            'payment_status' => 'required|in:paid,unpaid,overdue',
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('pdf')->store('billings', 'public');

        Billing::create([
            'property_id' => $request->property_id,
            'title' => $request->title,
            'description' => $request->description,
            'value' => $request->value,
            'expiration_date' => $request->expiration_date,
            'payment_status' => $request->payment_status,
            'pdf_path' => $path,
        ]);

        return redirect()->route('billing.index')->with('success', 'Billing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Billing $billing)
    {
        return view('billing.show', compact('billing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
