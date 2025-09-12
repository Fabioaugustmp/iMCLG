<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Billing::class, 'billing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $billings = Billing::with('property')->paginate(10);
        } else {
            $billings = Billing::where('active', true)->whereHas('property', function ($query) {
                $query->where('company_id', Auth::user()->company_id);
            })->with('property')->paginate(10);
        }

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
            'pdf' => 'required|file|mimes:pdf|max:2048',
            'month_reference' => 'nullable|integer|min:1|max:12',
        ]);

        $pdfPath = $request->file('pdf')->store('billings', 'public');

        $billing = Billing::create([
            'property_id' => $request->property_id,
            'title' => $request->title,
            'description' => $request->description,
            'value' => $request->value,
            'expiration_date' => $request->expiration_date,
            'payment_status' => $request->payment_status,
            'pdf_path' => $pdfPath,
            'month_reference' => $request->month_reference,
        ]);

        return redirect()->route('properties.billings', ['property' => $billing->property_id])->with('success', 'Billing created successfully.');
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
    public function edit(Billing $billing)
    {
        $properties = Properties::all();
        return view('billing.edit', compact('billing', 'properties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Billing $billing)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'title' => 'required',
            'description' => 'required',
            'value' => 'required|numeric',
            'expiration_date' => 'required|date',
            'payment_status' => 'required|in:paid,unpaid,overdue',
            'pdf' => 'nullable|mimes:pdf|max:2048',
            'month_reference' => 'nullable|integer|min:1|max:12',
        ]);

        $data = $request->except('pdf');

        if ($request->hasFile('pdf')) {
            Storage::disk('public')->delete($billing->pdf_path);
            $data['pdf_path'] = $request->file('pdf')->store('billings', 'public');
        }

        $data['month_reference'] = $request->month_reference;

        $billing->update($data);

        return redirect()->route('properties.billings', ['property' => $billing->property_id])->with('success', 'Billing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Billing $billing)
    {
        $property_id = $billing->property_id;
        $billing->active = !$billing->active;
        $billing->save();

        $message = $billing->active ? 'Billing activated successfully.' : 'Billing deactivated successfully.';

        return redirect()->route('properties.billings', ['property' => $property_id])->with('success', $message);
    }
}
