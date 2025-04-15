<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Name;


class NameController extends Controller
{
    public function checkName(Request $request)                             //
    {
        $name = $request->input('name');                               //this take the name from user input nname
        
        if (strlen($name) < 5) {
            return response()->json(['error' => 'Name must be at least 5 characters.']);
        }

       
        if (preg_match('/\d/', $name)) {
            return response()->json(['error' => 'Name should not contain numbers.']);           //preg_match -->> checks if there's at least one digit anywhere in the $name.
        }                                                                                       //  \d: This is a shorthand character class that matches any digit (0–9).

        $exists = Name::where('name', $name)->exists();                 // 3. Check if name exists in the DB


        if ($exists) {
            return response()->json(['message' => 'Name is not valid.']);
        }

     
        Name::create(['name' => $name]);                                    // 4. Save to DB

        return response()->json(['message' => 'Name saved successfully.']);
    }
}

