<?php

namespace App\Http\Controllers\backend;

use App\model\schoolBranch;
use App\model\classes;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\ClassTeacher;
use Auth;
use Validator;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
        $applyInstitutes=schoolBranch::orderBy('id', 'DESC')->where('activeStatus', false)->get();
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
        $id=Auth::guard('web')->user()->bId;
        if (Auth::guard('web')->user()->bId==0) {
            $Users=User::all();
            $roles=Role::all();
            $classes=classes::where('bId', Auth::guard('web')->user()->bId)->get();
        }else{
            $Users=User::where('bId', $id)->get();
            $roles=Role::whereNotIn('status', [1])->where('bId', Auth::guard('web')->user()->bId)->get();
            $classes=classes::where('bId', Auth::guard('web')->user()->bId)->get();
        }

        return view('backend.pages.userModule.createUserAndRole')->with('Users', $Users)->with('roles', $roles)->with('classes', $classes);
    }

    public function UserAndRoleList(){
        $id=Auth::guard('web')->user()->bId;
        if (Auth::guard('web')->user()->bId==0) {
            $Users=User::with('roles')->get();
        }else{
            $Users=User::where('bId', $id)->with(['roles'=>function($query){
                $query->whereNotIn('status', [1])->where('bId', Auth::guard('web')->user()->bId);
            }])->get();
        }

        $data_table_render = DataTables::of($Users)
        ->addColumn('hash',function ($row){

            return '#';
        })

            ->addColumn('action',function ($row){
                $edit_url = url('show/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>'.
                    '<button  onClick="btnDecline('.$row['id'].')" class="btn btn-dark btn-sm delete_class"><i class="fa fa-trash-o"></i></button>';
            })
            ->editColumn('role', function($Users)
                          {
                              foreach ($Users->roles as $role) {
                                return $role->name;
                              }

                          })
            ->rawColumns(['hash','action'])
            ->make(true);
        return $data_table_render;
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
            $user->bId=Auth::guard('web')->user()->bId;
            $user->password=Hash::make($password);
            $user->readablePassword=$password;

            $user->save();
            $user->assignRole($request->role);
            if($request->classId !=null){
                $ClassTeacher= new ClassTeacher();
                $ClassTeacher->classId=$request->classId;
                $ClassTeacher->userId=$user->id;
                $ClassTeacher->bId=$user->bId;
                $ClassTeacher->save();
            }

            return response()->json([
                "user"=>$request,
                "success" => "stored",
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
            "success" => "stored",
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
            $roles=Role::where('status',0)->where('bId', Auth::guard('web')->user()->bId)->get();
        }

        return view('backend.pages.userModule.createRole')->with('prms', $prms)->with('roles', $roles);
    }
    public function addRole(Request $request)
    {
        $role = new Role();
        $role->name=$request->roleName;
        $role->bId=Auth::guard('web')->user()->bId;
        $role->save();
        $role->syncPermissions($request->permissions);
        // $prm= new Permission();
        // $prm->name=$request->permissionName;
        // $prm->save();
        return response()->json([
            "success" => "stored",
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
            $user->bId=$sc->id;
            $user->password=Hash::make($password);
            $user->readablePassword=$password;
            $user->save();
            $user->assignRole(['School Admin']);
            // $user=DB::select("select * from users,school_branches where users.bId =school_branches.id and users.bId= '$request->id'");

                return response()->json([
                    "user"=>$user,
                    "schoolName"=>$sc->nameOfTheInstitution,
                    "success" => "stored",
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
        $user->bId=$sc->id;
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


        $bId=$user->bId;
        $user=DB::select("select * from users,school_branches where users.bId =school_branches.id and users.bId= '$bId'");
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
    public function show(){
        $user=User::FindOrFail(Auth::guard('web')->user()->id);
        return view('backend.pages.userModule.show',['users' => $user]);
    }

    public function profile()
    {
        $users=User::FindOrFail(Auth::guard('web')->user()->id);
        return view('backend.pages.userModule.show',['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user=User::FindOrFail(Auth::guard('web')->user()->id);
        return view('backend.pages.userModule.updateProfile',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        // $this->validate($request,[
        //         'name'=>'required',
        //         'email'=>'',
        //         'mobile'=>'',
        //         'designation'=>'',
        //         'joinDate'=>'',
        //         'address'=>'string',
        //         'skill'=>'',
        //         'education'=>'string',
        //         'biography'=>'',
        //         'resume'=>'',
        //         'certificate'=>'',
        //         'bId'=>'',
        //         ]); 
        // 2. data update
        $userss = User::find(Auth::guard('web')->user()->id);
        $userss->name = $request->name;
        $userss->email = $request->email;
        $userss->mobile = $request->mobile;
        $userss->designation = $request->designation;
        $userss->joinDate = $request->joinDate;
        $userss->address = $request->address;
        $userss->skill = $request->skill;
        $userss->educattion = $request->educattion;
        $userss->biography = $request->biography;
        $userss->resume = $request->resume;
        $userss->certificate = $request->certificate;
        $userss->bId = $request->bId;
        
        $userss->save();
        Session::flash('success','Successfully User Information Updated');
        return redirect()->back();
    }

    //Change password
    public function changePassword(Request $request){
        $this->validate($request,[
            'password'=>'required|string|confirmed|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
        ]);
        $users = User::find(Auth::guard('web')->user()->id);
        $users->password = Hash::make($request->password);
        $users->save();
        Session::flash('success','You Have Successfully Changed The Password');
        return redirect()->back();
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
