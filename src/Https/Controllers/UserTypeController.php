<?php
namespace Fitseder85\UserTypes\Https\Controllers;

use Fitseder85\UserTypes\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController
{
    // public function __construct() {
    //     $this->middleware('auth');
    //     $this->middleware(['auth', 'verified']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $userTypes = UserType::latestFirst()->active()->filter()->paginate(settingInfo('max_length_list'));
        return view('userTypes::index', compact('userTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $userType = New UserType;
        return view('userTypes::create', compact('userType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|unique:user_types,name',
            'description' => 'required'
        ]);

        $userType = new UserType();
        $userType->user_id = $request->user_id;
        $userType->name = $request->name;
        $userType->description = $request->description;
        if($userType->save()) {
            return redirect()->route('userTypes', $userType->id)->with('success', __("created successfully", ['name' => __("user type")]));
        }else{
            return redirect()->route('userTypes.create')->with('error', __("failed to create", ['name' => __("user type")]));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserType $userType) {
        return view('userTypes::show', compact('userType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserType $userType){
        return view('userTypes::edit', compact('userType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserType $userType) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'description' => 'required'
        ]);

        $userType->user_id = $request->user_id;
        $userType->name = $request->name;
        $userType->description = $request->description;
        if($userType->save()) {
            return redirect()->route('userTypes.show', $userType->id)->with('success', __("updated successfully", ['name' => __("user type")]));
        }else{
            return redirect()->route('userTypes.edit', $userType->id)->with('error', __("failed to update", ['name' => __("user type")]));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request) {
        $request->validate([
            'name' => 'required|exists:user_types,id'
        ]);

        $permission = UserType::findOrFail($request->name);
        if($permission->delete()) {
            return redirect()->route('userTypes')->with('success', __("deleted successfully", ['name' => __("user type")]));
        }else{
            return redirect()->route('userTypes.show', $request->name)->with('error', __("failed to deleted", ['name' => __("user type")]));
        }
    }

    public function status(Request $request, UserType $userType) {
        $userType->status = $request->status;
        if($userType->save()) {
            return redirect()->route('userTypes.show', $userType->id)->with('success', __("changed successfully", ['name' => __("status")]));
        }else{
            return redirect()->route('userTypes.show', $userType->id)->with('error', __("failed to changed", ['name' => __("status")]));
        }
    }
}
