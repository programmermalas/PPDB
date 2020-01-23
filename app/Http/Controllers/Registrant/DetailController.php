<?php

namespace App\Http\Controllers\Registrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Learner;
use App\Detail;

class DetailController extends Controller
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

        return view('pages.registrant.detail.index', compact('learner'));
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
            'number_of_siblings'    => 'required|numeric',
            'kps_pkh'               => 'required',
            'no_kps_pkh'            => 'nullable|max:25',
            'invited_from_school'   => 'required',
            'kip'                   => 'required',
            'no_kip'                => 'nullable|max:25',
            'name_of_kip'           => 'nullable|max:25',
            'physical_kip_card'     => 'required',
            'bank'                  => 'required|max:50',
            'account_number'        => 'required|max:25',
            'account_name'          => 'required|max:50',
        ]);
            
        try
        {

            $detail    = Detail::updateOrCreate([
                'learner_id'            => $request->id,
            ],
            [
                'number_of_siblings'    => $request->number_of_siblings,
                'kps_pkh'               => $request->kps_pkh,
                'no_kps_pkh'            => $request->no_kps_pkh,
                'invited_from_school'   => $request->invited_from_school,
                'kip'                   => $request->kip,
                'no_kip'                => $request->no_kip,
                'name_of_kip'           => $request->name_of_kip,
                'physical_kip_card'     => $request->physical_kip_card,
                'reason'                => $request->reason,
                'bank'                  => $request->bank,
                'account_number'        => $request->account_number,
                'account_name'          => $request->account_name,
            ]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('registrant.father.index');
    }
}
