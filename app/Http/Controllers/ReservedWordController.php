<?php

namespace App\Http\Controllers;

use App\Models\ReservedWord;
use Illuminate\Http\Request;

class ReservedWordController extends Controller
{
    public function list() {                            // to list all ReservedWord
        $reservedWords = ReservedWord::all();
        return view('reserved.reservedList', compact('reservedWords'));
    }

                                                        // to delete ReservedWord
    public function destroy($id) {
        $name = ReservedWord::findOrFail($id);
        $name->delete();
        return redirect()->back()->with('success', 'Reserved Word deleted successfully.');
    }

                                                        //Show create ReservedWord form

    public function create() {
        return view('reserved.addReservedWord');
    }

                                                    //Save the new ReservedWord
    public function store(Request $request) {
        $request->validate([
            'word' => 'required|string|unique:reserved_words,word',  //the word must not already exist in the reserved_words table in the word column.
        ]);

        ReservedWord::create([
        //column name
            'word' => $request->word,
        ]);
      
        return redirect()->route('dashboard')->with('success', 'Reserved word added successfully.');
    }



    public function edit($id){
        $reservedWords = ReservedWord::findOrFail($id);
        return view('reserved.EditReseverd', compact('reservedWords'));

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'word' => 'required|string|max:255|unique:reserved_words,word,' . $id,
        ]);

        $reservedWord = ReservedWord::findOrFail($id);
        $reservedWord->word = $request->word;
        $reservedWord->save();

        return redirect()->route('dashboard')->with('success', 'Reserved Word updated successfully.');
    }
    

};



