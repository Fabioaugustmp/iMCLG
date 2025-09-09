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
            $billings = Billing::whereHas('property', function ($query) {
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

        // dd($request);

        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'title' => 'required',
            'description' => 'required',
            'value' => 'required|numeric',
            'expiration_date' => 'required|date',
            'payment_status' => 'required|in:paid,unpaid,overdue',
            'pdf' => 'required|string', // FilePond sends the temporary path as a string in the 'pdf' field
        ]);

        // Get the temporary path from the hidden input field that FilePond creates
        $tempPdfPath = $request->input('pdf');

        // Move the file from the temporary location to its permanent location
        $finalPdfPath = null;
        if ($tempPdfPath && Storage::disk('public')->exists($tempPdfPath)) {
            $fileName = basename($tempPdfPath);
            // Ensure the 'billings' directory exists within 'public' disk
            if (!Storage::disk('public')->exists('billings')) {
                Storage::disk('public')->makeDirectory('billings');
            }
            Storage::disk('public')->move($tempPdfPath, 'billings/' . $fileName);
            $finalPdfPath = 'billings/' . $fileName;
        }

        // If the file was not moved, or tempPdfPath was null, handle the error
        if (!$finalPdfPath) {
            return back()->withErrors(['pdf' => 'PDF file upload failed.'])->withInput();
        }

        Billing::create([
            'property_id' => $request->property_id,
            'title' => $request->title,
            'description' => $request->description,
            'value' => $request->value,
            'expiration_date' => $request->expiration_date,
            'payment_status' => $request->payment_status,
            'pdf_path' => $finalPdfPath, // Use the final path
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
        ]);

        $data = $request->except('pdf');

        if ($request->hasFile('pdf')) {
            Storage::disk('public')->delete($billing->pdf_path);
            $data['pdf_path'] = $request->file('pdf')->store('billings', 'public');
        }

        $billing->update($data);

        return redirect()->route('billing.index')->with('success', 'Billing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Billing $billing)
    {
        Storage::disk('public')->delete($billing->pdf_path);
        $billing->delete();

        return redirect()->route('billing.index')->with('success', 'Billing deleted successfully.');
    }
}
