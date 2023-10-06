<li class="menu-section ">
  <h4 class="menu-text"> MAIN </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item menu-item-submenu {{ (request()->is('dashboard/families*')) ? 'menu-item-open' : '' }}">
  <a href="javascript:;" class="menu-link menu-toggle">
    <i class="menu-icon fas fa-list"></i>
    <span class="menu-text"> Families </span>
    <i class="menu-arrow"></i>
  </a>
  <div class="menu-submenu">
    <ul class="menu-subnav">
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/families/members*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/families/members') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Members </span></a></li>
    </ul>
  </div>
</li>

<li class="menu-section ">
  <h4 class="menu-text"> SCHEDULES </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item menu-item-submenu {{ (request()->is('dashboard/events*')) ? 'menu-item-open' : '' }}">
  <a href="javascript:;" class="menu-link menu-toggle">
    <i class="menu-icon fas fa-list"></i>
    <span class="menu-text"> Events </span>
    <i class="menu-arrow"></i>
  </a>
  <div class="menu-submenu">
    <ul class="menu-subnav">
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/events/content-challenges*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/events/content-challenges') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Content Challenges </span></a></li>
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/events/content-festivals*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/events/content-festivals') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Content Festivals </span></a></li>
    </ul>
  </div>
</li>
