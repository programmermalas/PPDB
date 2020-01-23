<?php

namespace App\Http\Controllers\Registrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

use App\Learner;
use App\Priodic;

class PriodicController extends Controller
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

        return view('pages.registrant.priodic.index', compact('learner'));
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
            'height'                => 'required|numeric',
            'weight'                => 'required|numeric',
            'distance_from_home'    => 'required',
            'kilometer'             => 'required|numeric',
            'time'                  => 'required|date_format:H:i',
        ]);
            
        try
        {
            $time   = null;

            if ($request->time)
            {
                $time   = Carbon::createFromFormat('H:i', $request->time);
            }

            $priodic    = Priodic::updateOrCreate([
                'learner_id'    => $request->id,
            ],
            [
                'height'                => $request->height,
                'weight'                => $request->weight,
                'distance_from_home'    => $request->distance_from_home,
                'kilometer'             => $request->kilometer,
                'time'                  => $time,
            ]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('registrant.cost.index');
    }
}
