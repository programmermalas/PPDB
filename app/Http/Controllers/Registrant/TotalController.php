<?php

namespace App\Http\Controllers\Registrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TotalController extends Controller
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
            $cost   = Auth::user()->registration->learner->cost;
            $total  = $cost->institutional_development_contributions + $cost->donation + $cost->facilities_and_infrastructure + $cost->educational_assistance_donors + $cost->uniform + $cost->infaq;
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('pages.registrant.cost.total.index', compact('cost', 'total'));
    }
}
