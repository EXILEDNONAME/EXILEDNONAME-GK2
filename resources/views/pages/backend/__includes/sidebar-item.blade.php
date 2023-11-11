<li class="menu-section ">
  <h4 class="menu-text"> MAIN </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item {{ (request()->is('dashboard/events*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/events') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Events </span></a></li>
<li class="menu-item {{ (request()->is('dashboard/schedules*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/schedules') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Schedules </span></a></li>
