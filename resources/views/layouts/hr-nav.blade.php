<li class="has-submenu">
    <a href="/branch"><i class="mdi mdi-google-pages"></i> <span> Branch </span> </a>
    <ul class="submenu">
        <li><a href="/branch/create">Create Branch</a></li>
        <li><a href="/branch/delete">Delete Branch</a></li>
    </ul>
</li>

<li class="has-submenu">
    <a href="/hour"><i class="fas fa-newspaper"></i> <span> Reports </span> </a>
    <ul class="submenu">
        <li><a href="/late">Late Report</a></li>
    </ul>
</li>

<li class="has-submenu">
    @if ($notification[2] || $notification[3])
        <a href="/scheduler" class="text-danger"><i class="mdi mdi-chart-donut-variant"></i> <span> Schedule </span> </a>
    @else
        <a href="/scheduler"><i class="mdi mdi-chart-donut-variant"></i> <span> Schedule </span> </a>
    @endif

    <ul class="submenu">
        @if ($notification[2])
            <li class="text-danger"><a href="/logs" class="text-danger">Logs</a></li>
        @else
            <li><a href="/logs">Logs</a></li>
        @endif

        @if ($notification[3])
            <li class="text-danger"><a href="/lates" class="text-danger">Lates</a></li>
        @else
            <li><a href="/lates">Lates</a></li>
        @endif
    </ul>
</li>

<li class="has-submenu">
    <a href="/create/employee"><i class="mdi mdi-view-list"></i> <span> Employee </span> </a>
    <ul class="submenu">
        <li><a href="/pins">Pins</a></li>
    </ul>
</li>

<li class="has-submenu">
    <a href="/dashboard"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
</li>

<li class="has-submenu">
    <a href="/logout"><i class="fas fa-power-off"></i> <span> Logout </span> </a>
</li>