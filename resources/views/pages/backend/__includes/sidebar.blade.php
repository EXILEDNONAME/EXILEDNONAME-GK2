<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
  <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
    <ul class="menu-nav ">

      <li class="menu-item {{ (request()->is('dashboard')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard') }}" class="menu-link"><i class="menu-icon fas fa-desktop"></i><span class="menu-text"> Dashboard </span></a></li>
      <li class="menu-item {{ (request()->is('dashboard/invoices*')) ? 'menu-item-active' : '' }}"><a href="javascript:;" class="menu-link" onclick="alert('Maintenance!')"><i class="menu-icon fas fa-balance-scale"></i><span class="menu-text"> Invoices </span></a></li>

      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/registrations*')) ? 'menu-item-open' : '' }}">
        <a href="javascript:;" class="menu-link menu-toggle">
          <i class="menu-icon fab fa-untappd"></i>
          <span class="menu-text"> Registrations </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
          <ul class="menu-subnav">
            <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/registrations/events*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/registrations/events') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Events </span></a></li>
          </ul>
        </div>
      </li>

      @include('pages.backend.__includes.sidebar-item')

      <li class="menu-section ">
        <h4 class="menu-text"> EXTENSIONS </h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
      </li>
      <li class="menu-item {{ (request()->is('dashboard/file-manager*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/file-manager') }}" class="menu-link"><i class="menu-icon fas fa-hdd"></i><span class="menu-text"> File Manager </span></a></li>


      <li class="menu-section ">
        <h4 class="menu-text"> SETTINGS </h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
      </li>

      <!-- <li class="menu-item {{ (request()->is('dashboard/settings/customizations*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/settings/customizations') }}" class="menu-link "><i class="menu-icon fas fa-paint-brush"></i><span class="menu-text"> Customizations </span></a></li> -->
      <!-- <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/settings/managements*')) ? 'menu-item-open' : '' }}">
        <a href="javascript:;" class="menu-link menu-toggle">
          <i class="menu-icon fas fa-user-shield"></i>
          <span class="menu-text"> Managements </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
          <ul class="menu-subnav">
            <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/settings/managements/accesses*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/settings/managements/accesses') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Accesses </span></a></li>
            <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/settings/managements/users*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/settings/managements/users') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Users </span></a></li>
          </ul>
        </div>
      </li> -->

      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/settings/profile*')) ? 'menu-item-open' : '' }}">
        <a href="javascript:;" class="menu-link menu-toggle">
          <i class="menu-icon fas fa-user"></i>
          <span class="menu-text"> Profile </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
          <ul class="menu-subnav">
            <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/settings/profile/account-informations*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/settings/profile/account-informations') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Account Informations </span></a></li>
            <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/settings/profile/change-password*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/settings/profile/change-password') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Change Password </span></a></li>
          </ul>
        </div>
      </li>

      <li class="menu-item"><a class="menu-link" id="logout"><i class="menu-icon fas fa-sign-out-alt"></i><span class="menu-text"> Logout </span></a></li>

    </ul>
  </div>
</div>
