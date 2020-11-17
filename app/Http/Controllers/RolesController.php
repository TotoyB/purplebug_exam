<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user() != null && auth()->user()->role->name == 'Administrator') {
            $roles = Role::orderBy('created_at', 'asc')->paginate(5);
            return view('roles.index')->with('roles', $roles);
        }
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user() != null && auth()->user()->role->name == 'Administrator') {
            return view('roles.create');
        }
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        return redirect()->route('roles.index')
            ->with('success', 'Role ' . $role->name . ' Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user() != null && auth()->user()->role->name == 'Administrator') {
            $role = Role::find($id);
            return view('roles.edit')->with('role', $role);
        }
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        return redirect()->route('roles.index')
            ->with('success', 'Role ' . $role->name . ' has been Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
