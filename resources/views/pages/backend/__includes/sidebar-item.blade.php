<li class="menu-section ">
  <h4 class="menu-text"> MAIN </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item menu-item-submenu {{ (request()->is('dashboard/applications/tables*')) ? 'menu-item-open' : '' }}">
  <a href="javascript:;" class="menu-link menu-toggle">
    <i class="menu-icon fas fa-list"></i>
    <span class="menu-text"> Families </span>
    <i class="menu-arrow"></i>
  </a>
  <div class="menu-submenu">
    <ul class="menu-subnav">
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/families/events*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/applications/tables/generals') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Generals </span></a></li>
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/families/events*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/applications/tables/relations') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Relations </span></a></li>
    </ul>
  </div>
</li>
<li class="menu-item menu-item-submenu {{ (request()->is('dashboard/managements*')) ? 'menu-item-open' : '' }}">
  <a href="javascript:;" class="menu-link menu-toggle">
    <i class="menu-icon fas fa-list"></i>
    <span class="menu-text"> Managements </span>
    <i class="menu-arrow"></i>
  </a>
  <div class="menu-submenu">
    <ul class="menu-subnav">
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/managements/broadcasters*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/managements/broadcasters') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Broadcasters </span></a></li>
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/managements/reports*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/managements/reports') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Reports </span></a></li>
    </ul>
  </div>
</li>
