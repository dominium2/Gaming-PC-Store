<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display the FAQ page.
     */
    public function index()
    {
        $faqs = Faq::all()->groupBy('category'); // Group FAQs by category
        return view('faq.faq', compact('faqs')); // Use 'faq.faq' instead of 'faq.index'
    }

    /**
     * Display the admin FAQ management page.
     */
    public function manage()
    {
        $faqs = Faq::all();
        return view('faq.manage-faq', compact('faqs'));
    }

    /**
     * Store a new FAQ.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->only(['category', 'question', 'answer']));

        return redirect()->route('faq.manage')->with('status', 'FAQ created successfully.');
    }

    /**
     * Update an existing FAQ.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($request->only(['category', 'question', 'answer']));

        return redirect()->route('faq.manage')->with('status', 'FAQ updated successfully.');
    }

    /**
     * Delete an FAQ.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.manage')->with('status', 'FAQ deleted successfully.');
    }
}
