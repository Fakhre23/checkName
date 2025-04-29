<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class SavedNameController extends Controller
{
    public function list() {

    $savedNames = Name::all();
    return view('dashboard.savedNames' , compact('savedNames'));
    }


    public function destroy($id) {
        $name = Name::findOrFail($id);
        $name->delete();
        return redirect()->back()->with('success', 'Name deleted successfully.');
    }
    
};
