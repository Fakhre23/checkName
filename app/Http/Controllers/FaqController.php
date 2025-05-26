<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{


    public function publicIndex()
    {
        $faqs = Faq::all();
        return view('faqs.public', compact('faqs'));
    }




    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }


    public function create()
    {
        return view('admin.faq.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        Faq::create($request->only('question', 'answer'));
        return redirect()->route('dashboard');
    }


    public function edit($id)
    {
        $faqs = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faqs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255|unique:faqs,question,' . $id,
            'answer' => 'required|string|max:255|unique:faqs,answer,' . $id,
        ]);

        Faq::findOrFail($id)->update($request->only('question', 'answer'));

        return redirect()->route('dashboard');
    }


    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('//');
    }

}

