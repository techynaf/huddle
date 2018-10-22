<li class="has-submenu">
    @if ($notification[0] == true || $notification[1] == true)
        <a href="/request" class="text-danger"><i class="fa fa-file-text-o text-danger"></i> <span> Leave Form </span> </a>
    @else
        <a href="/request"><i class="fa fa-file-text-o"></i> <span> Leave Form </span> </a>
    @endif

    <ul class="submenu">
        @if ($notification[0] == true)
            <li class="text-danger"><a href="/view/requests" class="text-danger">Leave Requests</a></li>
        @else
            <li><a href="/view/requests">Leave Requests</a></li>
        @endif

        @if ($notification[1] == true)
            <li class="text-danger"><a href="/show/weekly" class="text-danger">Day-off Requests</a></li>
        @else
            <li><a href="/show/weekly">Day-off Requests</a></li>
        @endif
        <li><a href="/create/leave">Create Leave</a></li>
        <li><a href="/create/weekly">Create Weekly Day Offs</a></li>
        <li><a href="/edit/weekly">Edit Weekly Day Offs</a></li>
    </ul>
</li>

<li class="has-submenu">
    @if ($notification[2] || $notification[3])
        <a href="/scheduler" class="text-danger"><i class="fa fa-clock-o"></i> <span> Schedule </span> </a>
    @else
        <a href="/scheduler"><i class="fa fa-clock-o"></i> <span> Schedule </span> </a>
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
    <a href="/hour"><i class="fa fa-line-chart"></i> <span> Reports </span> </a>
    <ul class="submenu">
        <li><a href="/late">Late Report</a></li>
    </ul>
</li>

<li class="has-submenu">
    <a href="/branch"><i class="fa fa-sitemap"></i> <span> Branch </span> </a>
    <ul class="submenu">
        <li><a href="/branch/create">Create Branch</a></li>
        <li><a href="/branch/delete">Delete Branch</a></li>
    </ul>
</li>

<li class="has-submenu">
    <a href="/dashboard"><i class="fa fa-th-large"></i> <span> Dashboard </span> </a>
</li>

<!-- <li class="has-submenu">
    <a href="/logout"><i class="fas fa-power-off"></i> <span> Logout </span> </a>
</li> -->