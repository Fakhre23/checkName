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
        return view('', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'qustion' => 'required',
            'answer' => 'required'
        ]);
        $faq->update($request->all());
        return redirect()->route('//');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('//');
    }

}

