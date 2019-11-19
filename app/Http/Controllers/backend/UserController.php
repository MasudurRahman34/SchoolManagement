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
use PDF;
use Illuminate\Support\Facades\DB;
use DataTables;
use Symfony\Component\HttpFoundation\JsonResponse;

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

        return view('backend.pages.userModule.requestedUser');
    }

    public function requestedUserData()
    {
        $applyInstitutes=schoolBranch::get();
        $data_table_render = DataTables::of($applyInstitutes)
        ->addColumn('Status',function ($row){

            return $row['activeStatus']==0 ? '<span class="badge badge-warning">Not Active</span>': '<span class="badge badge-success">Active</span>';
        })

            ->addColumn('action',function ($row){

                return '<button class="btn btn-success btn-sm" onClick="btnAccept('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                    '<button  onClick="btnDecline('.$row['id'].')" class="btn btn-dark btn-sm delete_class"><i class="fa fa-trash-o"></i></button>';
            })
            ->rawColumns(['Status','action'])
            ->make(true);
        return $data_table_render;

    }

    public function createUserAndRole()
    {
        $id=Auth::user()->branchId;
        if (Auth::user()->branchId==0) {
            $Users=User::all();
            $roles=Role::all();
        }else{
            $Users=User::where('branchId', $id)->get();
            $roles=Role::whereNotIn('status', [1])->get();
        }

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


    public function createPermission()
    {
        $roles=Role::all();
        $prms=Permission::all();

        return view('backend.pages.userModule.createPermission')->with('prms', $prms)->with('roles', $roles);
    }

    public function addPermission(Request $request)
    {
        $prm= new Permission();
        $prm->name=$request->permissionName;
        $prm->save();
        $prm->syncRoles($request->role);
        return response()->json([
            "data"=>$prm,
            "message" => "Success",
            200
        ]);
    }
    public function createRole()
    {

        if (Auth::guard('web')->user()->HasRole('Super Admin')) {
            $prms=Permission::all();
            $roles=Role::all();
        }else{
            $prms=Permission::where('status',0)->get();
            $roles=Role::where('status',0)->get();
        }

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

    public function createSchoolBranch()
    {

        return view('backend.pages.userModule.createSchoolBranch');
    }
    public function addSchoolBranch(Request $request)
    {
        if ($request->id) {
        $sc=schoolBranch::Find($request->id);
        $sc->activeStatus=1;
        $sc->save();
            $password=mt_rand(100000,999999);
            $user=new User;
            $user->email=$sc->email;
            $user->name=$sc->nameOfHead;
            $user->mobile=$sc->phoneNumber;
            $user->designation="School Admin";
            $user->branchId=$sc->id;
            $user->password=Hash::make($password);
            $user->readablePassword=$password;
            $user->save();
            $user->assignRole(['School Admin']);
            // $user=DB::select("select * from users,school_branches where users.branchId =school_branches.id and users.branchId= '$request->id'");

                return response()->json([
                    "user"=>$user,
                    "schoolName"=>$sc->nameOfTheInstitution,
                    "message" => "Success",
                        200
                    ]);

        }else{

        $password=mt_rand(100000,999999);

        $sc= New schoolBranch;
        $sc->nameOfTheInstitution=$request->nameOfTheInstitution;
        $sc->eiinNumber=$request->eiinNumber;
        $sc->phoneNumber=$request->phoneNumber;
        $sc->email=$request->email;
        $sc->district=$request->district;
        $sc->upazilla=$request->upazilla;
        $sc->nameOfHead=$request->nameOfHead;
        $sc->schoolType=$request->schoolType;
        $sc->address=$request->address;
        $sc->save();

        $user=new User;
        $user->email=$request->email;
        $user->name=$request->nameOfHead;
        $user->mobile=$request->phoneNumber;
        $user->branchId=$sc->id;
        $user->password=Hash::make($password);
        $user->readablePassword=$password;
        $user->save();
        $user->assignRole(['School Admin']);

        // return response()->json([
        //     "data"=>$apIns,
        //     "user"=>$user,
        //     "message" => "Success",
        //     "password"=>$password,
        //     200
        // ]);


        $branchid=$user->branchId;
        $user=DB::select("select * from users,school_branches where users.branchId =school_branches.id and users.branchId= '$branchid'");
        $pdf = PDF::loadView('backend.pages.pdf.schoolBranchPdf', ['user'=>$user])->setPaper('a4','portrait');
        $pdf->download('SchoolBranch.pdf');
        return $pdf->stream('SchoolBranch.pdf');

    }
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
