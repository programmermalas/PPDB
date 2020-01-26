<?php

namespace App\Http\Controllers\Registrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

use App\Personal;
use App\Learner;

class PersonalController extends Controller
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

        return view('pages.registrant.personal.index', compact('learner'));
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
            'date'                              => 'required|date_format:d/m/Y',
            'nick'                              => 'required|max:25',
            'gender'                            => 'required',
            'number_of_siblings'                => 'required|numeric',
            'order_in_family'                   => 'required|numeric',
            'numbe_family_card'                 => 'reguired|max:100',
            'birth_certificate_registration'    => 'required|max:50',
            'religion'                          => 'required',
        ]);

        try
        {
            $date   = Carbon::createFromFormat('d/m/Y', $request->date);

            $learner    = Learner::updateOrCreate([
                'registration_id'   => Auth::user()->registration->id
            ],
            [
                'created_at'        => $date,
            ]);

            $personal   = Personal::updateOrCreate([
                'learner_id'                        => $learner->id,
            ],
            [
                'nick'                              => $request->nick,
                'gender'                            => $request->gender,
                'number_of_siblings'                => $request->number_of_siblings,
                'order_in_family'                   => $request->order_in_family,
                'number_family_card'                => $request->number_family_card,
                'birth_certificate_registration'    => $request->birth_certificate_registration,
                'religion'                          => $request->religion,
            ]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('registrant.address.index');
    }
}
