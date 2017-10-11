<ul class="sidebar-menu">
    <li class="header">MAIN MENU</li>
    <li><a href="{{ url('/home') }}"><i class="fa fa-link"></i> <span>Home</span></a></li>
    @if(Auth::user()->can('laporan-view'))
        <li><a href="{{ url('/laporan') }}"><i class="fa fa-link"></i> <span>Laporan</span></a></li>
    @endif
    <li><a href="{{ url('/chat') }}"><i class="fa fa-link"></i> <span>Chat</span></a></li>

    @if(Auth::user()->hasRole('admin'))
        <li class="header">SETTINGS</li>
        @if(Auth::user()->can('user-view'))
            <li><a href="{{ url('/user') }}"><i class="fa fa-link"></i> <span>User</span></a></li>
        @endif
        @if(Auth::user()->can('role-view'))
            <li><a href="{{ url('/role') }}"><i class="fa fa-link"></i> <span>Role</span></a></li>
        @endif
        @if(Auth::user()->can('permission-view'))
            <li><a href="{{ url('/permission') }}"><i class="fa fa-link"></i> <span>Permission</span></a></li>
        @endif
    @endif
</ul>