<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;

use App\Registration;

class RegistrationExport implements FromView
{
    public function view(): View
    {
        $registrations = Registration::with('learner.cost', 'learner.personal')->whereYear('created_at', Carbon::now()->format('Y'))->get();

        return view('exports.registration.index', compact('registrations'));
    }
}
