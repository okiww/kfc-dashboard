<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if (Auth::user()->avatar)
                    <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle" alt="User Image" />
                @else
                    <img src="{{ asset('assets/defaultavatar.png') }}" class="img-circle" alt="User Image" />
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p> 
            </div>
        </div>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#"><span>Table</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/tmp-tpos-bill') }}">Tmp T Pos Bill</a></li>
                    <li><a href="{{ url('/tmp-tpos-bill-item') }}">Tmp T Pos Bill Item</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{{ url('/user') }}"><span>Users Management</span> <!-- <i class="fa fa-angle-left pull-right"></i> --></a>
                <!-- <ul class="treeview-menu">
                    <li><a href="">List User</a></li>
                    <li><a href="{{ url('/user/create') }}">Create</a></li>
                </ul> -->
            </li>
        </ul>
    </section>
    
</aside>