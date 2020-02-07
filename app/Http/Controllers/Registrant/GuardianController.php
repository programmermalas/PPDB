<?php

namespace App\Http\Controllers\Registrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

use App\Learner;
use App\Guardian;

class GuardianController extends Controller
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

        return view('pages.registrant.guardian.index', compact('learner'));
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
            'name'          => 'nullable|max:25',
            'nik'           => 'nullable|max:50',
            'year_of_birth' => 'nullable|date_format:Y',
            'last_study'    => 'nullable|max:10',
            'profession'    => 'nullable|max:25',
            'income'        => 'nullable|numeric',
            'phone'         => 'nullable|max:15',
        ]);

        try
        {
            $date   = null;
            $income = null;
            if ($request->income)
            {
                $income = str_replace('.', '', $request->income);
            }

            if ($request->year_of_birth)
            {
                $date   = Carbon::createFromFormat('Y', $request->year_of_birth);
            }

            $guardian    = Guardian::updateOrCreate([
                'learner_id'    => $request->id,
            ],
            [
                'name'          => $request->name,
                'nik'           => $request->nik,
                'year_of_birth' => $date,
                'last_study'    => $request->last_study,
                'profession'    => $request->profession,
                'income'        => $request->income,
                'phone'         => $request->phone,
            ]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('registrant.priodic.index');
    }
}
