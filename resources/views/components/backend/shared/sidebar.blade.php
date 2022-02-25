<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">Example user</span>
                        <span class="text-muted text-xs block">menu <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="{{ route('backend.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="{{ route('backend.users.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Users</span> </a>
            </li>
            <li>
                <a href="{{ route('backend.post.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Posts</span> </a>
            </li>
            <li>
                <a href="{{ route('backend.category.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Category</span> </a>
            </li>
        </ul>

    </div>
</nav>
