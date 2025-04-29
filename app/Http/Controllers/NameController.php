<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Name;
use App\Models\ReservedWord;



class NameController extends Controller
{
    public function checkName(Request $request)                             //
    {
        $name = $request->input('name');                               //this take the name from user input nname
        
        if (strlen($name) < 5) {
            return redirect()->back()->with('error', 'Name must be at least 5 characters.');
        }

       
        if (preg_match('/\d/', $name)) {                                                        //preg_match -->> checks if there's at least one digit anywhere in the $name.
            return redirect()->back()->with('error', 'Name should not contain numbers.');       //  \d: This is a shorthand character class that matches any digit (0–9).
        }                                                                                       

        $exists = Name::where('name', $name)->exists();                                        // 3. Check if name exists in the DB
        $reserved = ReservedWord::where('word' , $name)->exists();
       
        if ($exists) {  
            return redirect()->back()->with('error', 'The Name is Already exists.');
        }

        if ($reserved) {
            return redirect()->back()->with('error', 'Name is not valid.');
        }

     
        Name::create(['name' => $name]);                                    // 4. Save to DB

        return redirect()->back()->with('message', 'Name saved successfully.');
    }
}



