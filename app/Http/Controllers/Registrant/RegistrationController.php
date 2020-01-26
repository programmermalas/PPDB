<?php

namespace App\Http\Controllers\Registrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

use App\Registration;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $registration   = Registration::where('user_id', Auth::id())->first();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('pages.registrant.registration.index', compact('registration'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_of_candidate' => 'required|max:25',
            'place_of_birth'    => 'required|max:25',
            'date_of_birth'     => 'required|date_format:d/m/Y',
            'school_origin'     => 'nullable|max:100',
            'address'           => 'required',
        ]);

        try
        {
            $date   = Carbon::createFromFormat('d/m/Y', $request->date_of_birth);
            
            $registration   = Registration::updateOrCreate([
                'user_id'           => Auth::id(),
            ],
            [
                'name_of_candidate' => $request->name_of_candidate,
                'place_of_birth'    => $request->place_of_birth,
                'date_of_birth'     => $date,
                'school_origin'     => $request->school_origin,
                'address'           => $request->address,
            ]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('registrant.personal.index');
    }
}
