<?php

namespace App\Http\Controllers\backend;

use App\model\schoolBranch;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function requestedUser()
    {
        $applyInstitutes=ApplyInstitute::all();

        return view('backend.pages.userModule.requestedUser')->with('applyInstitutes', $applyInstitutes);
    }

    public function createUserAndRole()
    {
        $Users=User::all();
        $roles=Role::all();

        return view('backend.pages.userModule.createUserAndRole')->with('Users', $Users)->with('roles', $roles);
    }
    public function addUserAndRole(Request $request)
    {
        $validator= Validator::make($request->all(), User::$rules);
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors(), 400]);
        }else{
            $password=mt_rand(100000,999999);

            $user=new User;
            $user->email=$request->email;
            $user->name=$request->name;
            $user->mobile=$request->mobile;
            $user->designation=$request->designation;
            // $user->role=$request->role;
            $user->joinDate=$request->joinDate;
            $user->address=$request->address;
            $user->branchId=Auth::user()->branchId;
            $user->password=Hash::make($password);
            $user->readablePassword=$password;
            $user->save();
            $user->assignRole($request->role);

            return response()->json([
                "user"=>$request,
                "message" => "Success",
                "password"=>$password,
                200
            ]);
        }


    }


    public function createSchoolBranch()
    {

        return view('backend.pages.userModule.createSchoolBranch');
    }
    public function createPermission()
    {
        $prms=Permission::all();

        return view('backend.pages.userModule.createPermission')->with('prms', $prms);
    }

    public function addPermission(Request $request)
    {
        $prm= new Permission();
        $prm->name=$request->permissionName;
        $prm->save();
        return response()->json([
            "data"=>$prm,
            "message" => "Success",
            200
        ]);
    }
    public function createRole()
    {
        $prms=Permission::all();
        $roles=Role::all();

        return view('backend.pages.userModule.createRole')->with('prms', $prms)->with('roles', $roles);
    }
    public function addRole(Request $request)
    {
        $role = new Role();
        $role->name=$request->roleName;
        $role->save();
        $role->syncPermissions($request->permissions);
        // $prm= new Permission();
        // $prm->name=$request->permissionName;
        // $prm->save();
        return response()->json([
            "message" => "Success",
            200
        ]);
    }

    public function addSchoolBranch(Request $request)
    {
        $password=mt_rand(100000,999999);
        $apIns= New schoolBranch;
        $apIns->nameOfTheInstitution=$request->nameOfTheInstitution;
        $apIns->eiinNumber=$request->eiinNumber;
        $apIns->phoneNumber=$request->phoneNumber;
        $apIns->email=$request->email;
        $apIns->district=$request->district;
        $apIns->upazilla=$request->upazilla;
        $apIns->nameOfHead=$request->nameOfHead;
        $apIns->schoolType=$request->schoolType;
        $apIns->address=$request->address;
        $apIns->save();

        $user=new User;
        $user->email=$request->email;
        $user->name=$request->nameOfHead;
        $user->mobile=$request->phoneNumber;
        $user->branchId=$apIns->id;
        $user->password=Hash::make($password);
        $user->readablePassword=$password;
        $user->save();

        return response()->json([
            "data"=>$apIns,
            "user"=>$user,
            "message" => "Success",
            "password"=>$password,
            200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
