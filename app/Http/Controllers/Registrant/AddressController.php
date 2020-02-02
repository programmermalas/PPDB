<?php

namespace App\Http\Controllers\Registrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Learner;
use App\Address;

class AddressController extends Controller
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

        return view('pages.registrant.address.index', compact('learner'));
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
            'street'                        => 'required|max:50',
            'neighborhood_association'      => 'required|numeric',
            'citizens_association'          => 'required|numeric',
            'village'                       => 'required|max:50',
            'sub_district'                  => 'required|max:50',
            'postal_code'                   => 'required|max:10',
            'residence'                     => 'required',
            'transportation'                => 'required',
        ]);

        try
        {
            $address    = Address::updateOrCreate([
                'learner_id'                    => $request->id,
            ],
            [
                'street'                        => $request->street,
                'neighborhood_association'      => $request->neighborhood_association,
                'citizens_association'          => $request->citizens_association,
                'village'                       => $request->village,
                'sub_district'                  => $request->sub_district,
                'postal_code'                   => $request->postal_code,
                'residence'                     => $request->residence,
                'transportation'                => $request->transportation,
            ]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('registrant.father.index');
    }
}
