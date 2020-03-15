<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('status')->where('user_type_id', 2)->get();
        return view('dashboard.admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create');
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
            'name'   =>  'required',
            'email'   =>  'required|unique:users,email',
            'password'   =>  'required|confirmed|min:8',
            'phone'   =>  'required',
        ], [] , [
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->user_type_id = 2;
        $user->status_id = 1;
        $user->save();

        return redirect(adminUrl('admin'))->with('create', 'تمت اضافة مدير للتطبيق بنجاح');
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
        $user = User::find($id);
        return view('dashboard.admin.edit', compact('user'));
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
        $user = User::find($id);

        $request->validate([
            'name'   =>  'required',
            'email'   =>  'required|unique:users,id,'. $id .'|max:100',
            'password'   =>  'required|confirmed|min:8',
            'phone'   =>  'required',
        ], [] , [
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->user_type_id = 2;
        $user->status_id = 1;
        $user->save();

        return redirect(adminUrl('admin'))->with('update', 'تمت تعديل مدير للتطبيق بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect(adminUrl('admin'))->with('update', 'تم حذف مدير للتطبيق بنجاح');
    }
}
