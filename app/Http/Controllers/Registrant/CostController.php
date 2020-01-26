<?php

namespace App\Http\Controllers\Registrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

use App\Learner;
use App\Cost;

class CostController extends Controller
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
            if (Auth::user()->registration->id)
            {
                $learner   = Learner::with('personal')->where('registration_id', Auth::user()->registration->id)->first();
            }
            else
            {
                return redirect()->route('registrant.registration.index')->with('info', 'Silahkan isi registrasi terlebih dahulu');
            }
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('pages.registrant.cost.index', compact('learner'));
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
            'institutional_development_contributions'   => 'required|numeric',
            'donation'                                  => 'required|numeric',
            'facilities_and_infrastructure'             => 'required|numeric',
            'educational_assistance_donors'             => 'required|numeric',
            'infaq'                                     => 'required|numeric',
        ]);

        try
        {
            $uniform    = 530000;

            if (Auth::user()->registration->learner->personal->gender == 'girl')
            {
                $uniform    = 580000;
            }

            $cost   = Cost::updateOrCreate([
                'learner_id'                                => $request->id,
            ],
            [
                'institutional_development_contributions'   => $request->institutional_development_contributions,
                'donation'                                  => $request->donation,
                'facilities_and_infrastructure'             => $request->facilities_and_infrastructure,
                'educational_assistance_donors'             => $request->educational_assistance_donors,
                'uniform'                                   => $uniform,
                'infaq'                                     => $request->infaq,
            ]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('registrant.cost.total.index');
    }
}
