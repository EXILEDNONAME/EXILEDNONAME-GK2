<li class="menu-item menu-item-submenu {{ (request()->is('dashboard/schedules*')) ? 'menu-item-open' : '' }}">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon fas fa-calendar-check"></i>
    <span class="menu-text"> Schedules </span>
    <i class="menu-arrow"></i>
  </a>
  <div class="menu-submenu">
    <ul class="menu-subnav">
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/schedules/events*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/schedules/events') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Events </span></a></li>
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/schedules/pk*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/schedules/pk') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> PK </span></a></li>
    </ul>
  </div>
</li>
<li class="menu-item {{ (request()->is('dashboard/search-members*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/search-members') }}" class="menu-link"><i class="menu-icon fas fa-search"></i><span class="menu-text"> Search Members </span></a></li>

<li class="menu-section ">
  <h4 class="menu-text"> MAIN </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item {{ (request()->is('dashboard/events*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/events') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Events </span></a></li>

@role('master-administrator|administrator')
<li class="menu-section ">
  <h4 class="menu-text"> FAMILY </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item {{ (request()->is('dashboard/family/members*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/family/members') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Members </span></a></li>
@endrole
