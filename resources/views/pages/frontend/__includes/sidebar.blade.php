<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
  <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
    <ul class="menu-nav ">

      <li class="menu-item {{ (request()->is('main')) ? 'menu-item-active' : '' }}"><a href="javascript:;" class="menu-link" onclick="alert('Maintenance!')"><i class="menu-icon fas fa-desktop"></i><span class="menu-text"> General </span></a></li>
      <li class="menu-item {{ (request()->is('members')) ? 'menu-item-active' : '' }}"><a href="javascript:;" class="menu-link" onclick="alert('Maintenance!')"><i class="menu-icon fas fa-users"></i><span class="menu-text"> Members </span></a></li>

      <li class="menu-item menu-item-submenu {{ (request()->is('schedules*')) ? 'menu-item-open' : '' }}">
        <a href="javascript:;" class="menu-link menu-toggle">
          <i class="menu-icon fas fa-list"></i>
          <span class="menu-text"> Schedules </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
          <ul class="menu-subnav">
            <li class="menu-item menu-item-submenu {{ (request()->is('schedules/events*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/schedules/events') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Events </span></a></li>
            <li class="menu-item menu-item-submenu {{ (request()->is('schedules/pk*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/schedules/pk') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> PK </span></a></li>
          </ul>
        </div>
      </li>

    </ul>
  </div>
</div>
