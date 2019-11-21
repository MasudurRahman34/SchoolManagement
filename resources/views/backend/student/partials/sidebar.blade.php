<aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{Auth::guard('student')->user()->firstName}}</p>
          <p class="app-sidebar__user-designation">{{Auth::guard('student')->user()->lastName}}</p>
        </div>
      </div>
      <ul class="app-menu">
            @if (Route::has('school.home'))
            <li><a class="app-menu__item {{ Request::is('student.index*') ? 'active' : '' }}" href="{{url('/student/index ')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            @else
            <li><a class="app-menu__item" href="{{route('school.corner')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">School Corner</span></a></li>
            @endif



        <li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label text-warning">Settings</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="#"><i class="icon fa fa-angle-right"></i>Privacy</a></li>
                <li><a class="treeview-item" href="{{route('student.show')}}"><i class="icon fa fa-angle-right"></i>Profile</a></li>
            </ul>
          </li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">My Class</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('section.index')}}"><i class="icon fa fa-angle-right"></i>Class And Batch</a></li>
              <li><a class="treeview-item" href="{{route('section.index')}}"><i class="icon fa fa-angle-right"></i>ClassMates</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">My Subject</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('section.index') }}"><i class="icon fa fa-angle-right"></i>Admission</a></li>
              <li><a class="treeview-item" href="{{route('section.index') }}"><i class="icon fa fa-angle-right"></i>Subject List</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Exam</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('section.index') }}"><i class="icon fa fa-angle-right"></i>Student</a></li>
              <li><a class="treeview-item" href="#"><i class="icon fa fa-angle-right"></i>Exam Routine Download</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Class Routine</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('section.index') }}"><i class="icon fa fa-angle-right"></i>Teacher</a></li>
              <li><a class="treeview-item" href="#"><i class="icon fa fa-angle-right"></i>Student</a></li>
            </ul>
          </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Attendence</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('attendence.index') }}"><i class="icon fa fa-angle-right"></i>Monthly Attendance</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Expence</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('section.index') }}"><i class="icon fa fa-angle-right"></i>Section</a></li>
            </ul>
          </li>
      </ul>
    </aside>
