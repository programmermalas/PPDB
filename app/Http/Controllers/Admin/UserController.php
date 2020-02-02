<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use PDF;

use App\User;

class UserController extends Controller
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
            $users  = User::all();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('pages.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try
        {
            $roles  = Role::orderBy('created_at', 'DESC')->get();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('pages.admin.user.create', compact('roles'));
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
            'name'      => 'required',
            'password'  => 'required|confirmed',
        ]);

        try
        {
            $year   = Carbon::now()->format('Y');
            $userCount  = User::withTrashed()->whereYear('created_at', $year)->whereHas('roles', function ($query) {
                return $query->where('name', 'registrant');
            })->count();
            $number = $year . '-B' . str_pad($userCount + 1, 4, '0', STR_PAD_LEFT);

            if ($request->role == 1)
            {
                $userCount  = User::whereHas('roles', function ($query) {
                    return $query->where('name', 'admin');
                })->count();
                $number = str_pad($userCount + 1, 2, '0', STR_PAD_LEFT);
            }

            $user   = User::create([
                'name'                  => $request->name,
                'number'                => $number,
                'password'              => bcrypt($request->password),
                'password_in_string'    => $request->password,
            ]);

            $role   = Role::findOrFail($request->role);
            $user->assignRole($role->id);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.user.index')->with('success', "User $user->name stored!");
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
            $users  = User::where('name', 'LIKE', "%$keyword%")->orWhere('number', 'LIKE', "%$keyword%")->get();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('pages.admin.user.show', compact('users', 'keyword'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        try
        {
            $roles  = Role::all();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('pages.admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'      => 'required',
            'number'    => "required|unique:users,number,$request->number,number",
            'password'  => 'nullable|confirmed',
        ]);

        try
        {
            $user->name     = $request->name;
            $user->number   = $request->number;

            if ($request->password)
            {
                $user->password             = bcrypt($request->password);
                $user->password_in_string   = $request->password;
            }

            $user->save();
            $role   = Role::findOrFail($request->role);
            $user->syncRoles($role->id);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.user.index')->with('info', "User $user->name updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try
        {
            $user->delete();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.user.index')->with('warning', "User $user->name destroyed!");
    }

    public function print(User $user)
    {
        $pdf    = PDF::loadview('pdfs.registration.index', compact('user'));

        return $pdf->stream('pendaftar.pdf');
    }
}
