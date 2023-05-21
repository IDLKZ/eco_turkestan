<li class="{{request()->routeIs($route) ? 'bg-cyan-950': ''}}">
    <a class="nav-link" href="{{route($route)}}">
        <i class="{{$icon}}" aria-hidden="true"></i>
        <span>{{$routeName}}</span>
    </a>
</li>
