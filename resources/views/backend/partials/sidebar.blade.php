<aside class="app-sidebar">
      <div class="app-sidebar__user">
{{--          @foreach($user->file as $fill)--}}
{{--              @if($fill->type=="profile")--}}
{{--          <img class="app-sidebar__user-avatar" src="{{asset('users/'.Auth::guard('student')->user()->image)}}" style="width: 20%; height: 20%;" alt="User Image">--}}
{{--              @endif--}}
{{--          @endforeach--}}
        <div>
          <p class="app-sidebar__user-name">{{Auth::guard('web')->user()->name}}</p>
          <p class="app-sidebar__user-designation">{{Auth::guard('web')->user()->designation}}</p>
        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item active" href="{{route('admin.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        {{-- cheking admin --}}
        @if (Auth::guard('web')->check())

        @can('Super Admin')
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label text-warning">Super Admin</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('createSchoolBranch')}}"><i class="icon fa fa-angle-right"></i>Create School Branch</a></li>
                <li><a class="treeview-item" href="{{route('requestedUser')}}"><i class="icon fa fa-angle-right"></i>Requested School</a></li>
                <li><a class="treeview-item" href="{{route('createUserAndRole')}}"><i class="icon fa fa-angle-right"></i>Add User</a></li>
                <li><a class="treeview-item" href="{{route('createPermission')}}"><i class="icon fa fa-angle-right"></i>Permission</a></li>
                {{-- <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>ALL User</a></li> --}}
            </ul>
          </li>
          @endcan

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Settings</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('user.show')}}"><i class="icon fa fa-angle-right"></i>My Profile</a></li>

            </ul>
          </li>
        {{-- end superadmin --}}

        {{-- //Start user Management --}}
        @can('User Management')
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Employee Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              {{-- <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-angle-right"></i>My User & Password</a></li> --}}
                <li><a class="treeview-item" href="{{route('createUserAndRole')}}"><i class="icon fa fa-angle-right"></i>Add User</a></li>
              <li><a class="treeview-item" href="{{route('createRole')}}"><i class="icon fa fa-angle-right"></i>Role & Permissions</a></li>
            </ul>
          </li>
          @endcan
          {{-- //end user management --}}
          @can('Student')
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Student</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('mystudent.index') }}"><i class="icon fa fa-angle-right"></i>All Student</a></li>
              <li><a class="treeview-item" href="{{route('mystudent.classwise') }}"><i class="icon fa fa-angle-right"></i>Class Wise Student</a></li>
              {{-- <li><a class="treeview-item" href="{{route('section.index') }}"><i class="icon fa fa-angle-right"></i>Previous Student</a></li> --}}
              <li><a class="treeview-item" href="{{route('mystudent.sectionwise') }}"><i class="icon fa fa-angle-right"></i>Section Wise Student</a></li>
            </ul>
          </li>
          @endcan
          @can('Attendance')

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Student Attendance</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('attendance.index') }}"><i class="icon fa fa-angle-right"></i>Today Attendance </a></li>
              <!-- <li><a class="treeview-item" href="{{route('attendance.classwish') }}"><i class="icon fa fa-angle-right"></i>class wish</a></li> -->
              <li><a class="treeview-item" href="{{route('attendance.bydate') }}"><i class="icon fa fa-angle-right"></i>Datewish Attendance</a></li>
            </ul>
          </li>
          @endcan
          @can('Admission')

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Admission</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('admissison.index') }}"><i class="icon fa fa-angle-right"></i>Admission</a></li>
            </ul>
          </li>
          @endcan

        @can('Class')
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Class</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{ route('class.index') }}"><i class="icon fa fa-angle-right"></i>Class</a></li>
            </ul>
          </li>
          @endcan

            @can('Section')
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Section</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('section.index') }}"><i class="icon fa fa-angle-right"></i>Section</a></li>
            </ul>
          </li>
          @endcan
          @can('Subject')
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Subject</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('subject.index') }}"><i class="icon fa fa-angle-right"></i>Subject</a></li>
            </ul>
          </li>
          @endcan

          @can('SessionYear')
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Session Year</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('sessionyear.index') }}"><i class="icon fa fa-angle-right"></i>Session year</a></li>
            </ul>
          </li>
          @endcan





          {{-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Group</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('group.index') }}"><i class="icon fa fa-angle-right"></i>Group</a></li>
            </ul>
          </li> --}}



          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Marks Distribution (underdevlopment)</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('marks.index') }}"><i class="icon fa fa-angle-right"></i>Provied Marks </a></li>
              <!-- <li><a class="treeview-item" href="{{route('attendance.classwish') }}"><i class="icon fa fa-angle-right"></i>class wish</a></li> -->
              {{-- <li><a class="treeview-item" href="{{route('attendance.bydate') }}"><i class="icon fa fa-angle-right"></i>Datewish Attendance</a></li> --}}
            </ul>
          </li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Fee Mnagement</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('fee.index') }}"><i class="icon fa fa-angle-right"></i>Manage Fee </a></li>
              <li><a class="treeview-item" href="{{route('feehistory.index') }}"><i class="icon fa fa-angle-right"></i>Fee Update History </a></li>
              <li><a class="treeview-item" href="{{route('feecollection.index') }}"><i class="icon fa fa-angle-right"></i> Take Fee</a></li>
               {{-- <li><a class="treeview-item" href="{{route('fee.classwish') }}"><i class="icon fa fa-angle-right"></i>class wish</a></li>  --}}
              {{-- <li><a class="treeview-item" href="{{route('attendance.bydate') }}"><i class="icon fa fa-angle-right"></i>Datewish Attendance</a></li> --}}
            </ul>
          </li>

          {{-- end admin sidebar --}}

          {{-- student side bar --}}
            @else

          @endif
      </ul>
    </aside>
