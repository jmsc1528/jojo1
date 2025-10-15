<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Subjects;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
      'name' => 'required',
      'role' => 'required',
      'email'=> 'required|email',
      'password'=>'required',
    ]);
    
    $validated['password'] = Hash::make($request->password);
    
    $user = new User;
    $user->create($validated);
    return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        return view('update',['user'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
      'name' => 'required',
      'role' => 'required',
      'email'=> 'required|email',
    ]);
    
    
    $user = User::find($request->id);
    $user->update($validated);
    return redirect('/home');
    }

    //delete data
    public function delete($id)
    {
    $data = User::find($id);
    return view('delete',['user'=>$data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect('/home');
    }
    public function user_subjects($id)
    {

    $subjects = Subjects::whereHas('user_subjects',
    function($q) use ($id){
    $q->where('user_id',$id);})->get();
    return 
    view('user_subjects',['id'=>$id,'subjects'=>$subjects]);

    }
    public function add_user_subject($id){
    $subjects = Subjects::whereDoesntHave('user_subjects',
    function($q) use ($id){
        $q->where('user_id',$id);})->get();
    return 
    view('add_subjects',['subjects'=>$subjects]);
    }

}
 
