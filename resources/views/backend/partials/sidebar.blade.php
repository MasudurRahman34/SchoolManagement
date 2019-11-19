<aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{Auth::guard('web')->user()->name}}</p>
          <p class="app-sidebar__user-designation">{{Auth::guard('web')->user()->name}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        {{-- cheking admin --}}
        @if (Auth::guard('web')->check())

        @can('Super Admin')
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label text-warning">Super Admin</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('createSchoolBranch')}}"><i class="icon fa fa-angle-right"></i>Create School Branch</a></li>
                <li><a class="treeview-item" href="{{route('requestedUser')}}"><i class="icon fa fa-angle-right"></i>Requested School</a></li>
                <li><a class="treeview-item" href="{{route('createUserAndRole')}}"><i class="icon fa fa-angle-right"></i>User & Role</a></li>
                <li><a class="treeview-item" href="{{route('createPermission')}}"><i class="icon fa fa-circle-o"></i>Permission</a></li>
                <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>ALL User</a></li>
            </ul>
          </li>
          @endcan
        {{-- end superadmin --}}

        {{-- //Start user Management --}}
        @can('User Management')
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">User Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-angle-right"></i>My User & Password</a></li>
                <li><a class="treeview-item" href="{{route('createUserAndRole')}}"><i class="icon fa fa-angle-right"></i>User & Role</a></li>
              <li><a class="treeview-item" href="{{route('createRole')}}"><i class="icon fa fa-angle-right"></i>Role & Permission</a></li>
            </ul>
          </li>
          @endcan
          {{-- //end user management --}}

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Admission</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('admissison.index') }}"><i class="icon fa fa-angle-right"></i>Admission</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Student</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('section.index') }}"><i class="icon fa fa-angle-right"></i>Student</a></li>
            </ul>
          </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Class</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('class.index') }}"><i class="icon fa fa-angle-right"></i>Class</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Section</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('section.index') }}"><i class="icon fa fa-angle-right"></i>Section</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Group</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('group.index') }}"><i class="icon fa fa-angle-right"></i>Group</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Subject</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('subject.index') }}"><i class="icon fa fa-angle-right"></i>Subject</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Session Year</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('sessionyear.index') }}"><i class="icon fa fa-angle-right"></i>Session year</a></li>
            </ul>
          </li>

          {{-- end admin sidebar --}}

          {{-- student side bar --}}
            @else

          @endif
      </ul>
    </aside>
