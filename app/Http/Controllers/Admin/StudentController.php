<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use PDF;
use Auth;

use App\Registration;

class StudentController extends Controller
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
            $students    = Registration::whereYear('created_at', Carbon::now()->format('Y'))->get();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('pages.admin.student.index', compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try
        {
            $keyword    = $request->keyword;
            $students   = Registration::where('name_of_candidate', 'LIKE', "%$keyword%")->get();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('pages.admin.student.show', compact('students', 'keyword'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        return view('pages.admin.student.edit', compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'name_of_candidate'     => 'required|max:25',
            'nominal'               => 'required',
        ]);

        try
        {
            $nominal = null;
            if ($request->nominal)
            {
                $nominal = str_replace('.', '', $request->nominal);
            }

            $registration->name_of_candidate    = $request->name_of_candidate;
            $registration->status = 'unpayment';
            if ($nominal > 0)
            {
                $registration->status = 'payment';
            }
            $registration->nominal              = $nominal;
            $registration->save();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.student.index')->with('info', "Student $registration->name_of_candidate updated!");
    }

    public function print(Registration $registration)
    {
        $cost   = $registration->learner->cost;
        $total  = $cost->institutional_development_contributions + $cost->donation + $cost->facilities_and_infrastructure + $cost->educational_assistance_donors + $cost->uniform + 865000 + 605000 + 100000 + $cost->infaq;

        $pdf    = PDF::loadview('pdfs.student.index', compact('registration', 'cost', 'total'))->setPaper([0, 0, 612, 935.433]);

        return $pdf->stream('rincian biaya.pdf');
    }
}
