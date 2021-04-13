<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{ (Route::currentRouteName() == 'admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Blog </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ (Route::currentRouteName() == 'post.create') ? 'ok' : '' }}"><a href="{{ route('post.create') }}"> Add New Post </a></li>
                        <li class="{{ (Route::currentRouteName() == 'post.index') ? 'ok' : '' }}"><a href="{{ route('post.index') }}"> All Posts </a></li>
                        <li class="{{ (Route::currentRouteName() == 'category.index') ? 'ok' : '' }}"><a href="{{ route('category.index') }}"> Category </a></li>
                        <li class="{{ (Route::currentRouteName() == 'tag.index') ? 'ok' : '' }}"><a href="{{ route('tag.index') }}"> Tags </a></li>
                    </ul>
                </li>
                <li class="{{ (Route::currentRouteName() == 'role.index') ? 'active' : '' }}">
                    <a href="{{ route('role.index') }}"><i class="fa fa-wrench" aria-hidden="true"></i> <span>Role</span></a>
                </li>
                <li>
                    <a href="specialities.html"><i class="fe fe-users"></i> <span>Specialities</span></a>
                </li>
                <li>
                    <a href="doctor-list.html"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>
                <li>
                    <a href="patient-list.html"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>