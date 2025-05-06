<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class SavedNameController extends Controller
{
    public function list() {

    $savedNames = Name::all();
    return view('Names.savedNames' , compact('savedNames'));
    }


    public function destroy($id) {
        $name = Name::findOrFail($id);
        $name->delete();
        return redirect()->back()->with('success', 'Name deleted successfully.');
    }

    

    public function edit($id){
        $savedNames = Name::findOrFail($id);
        return view('Names.EditNames', compact('savedNames'));

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:names,name,' . $id,
        ]);

        $savedName = Name::findOrFail($id);
        $savedName->name = $request->name;
        $savedName->save();

        return redirect()->route('dashboard')->with('success', 'Name is updated successfully.');
    }


    
};
