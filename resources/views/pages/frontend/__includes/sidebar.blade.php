<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
  <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
    <ul class="menu-nav ">

      <li class="menu-item {{ (request()->is('dashboard')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard') }}" class="menu-link"><i class="menu-icon fas fa-desktop"></i><span class="menu-text"> Dashboard </span></a></li>

      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/families*')) ? 'menu-item-open' : '' }}">
        <a href="javascript:;" class="menu-link menu-toggle">
          <i class="menu-icon fas fa-list"></i>
          <span class="menu-text"> Schedules </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
          <ul class="menu-subnav">
            <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/families/members*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/families/members') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Events </span></a></li>
            <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/families/members*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/families/members') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> PK </span></a></li>
          </ul>
        </div>
      </li>

      <li class="menu-item"><a class="menu-link" id="logout"><i class="menu-icon fas fa-sign-out-alt"></i><span class="menu-text"> Logout </span></a></li>

    </ul>
  </div>
</div>
