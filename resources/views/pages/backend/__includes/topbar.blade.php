<div id="kt_header" class="header header-fixed">
  <div class="container-fluid  d-flex align-items-stretch justify-content-between">
    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
      <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default">
        <ul class="menu-nav">
          <li class="menu-item menu-item-submenu menu-item-rel menu-item-active" data-menu-toggle="click" aria-haspopup="true">
            <a href="javascript:void(0);" class="menu-link menu-toggle btn disabled">
              <span class="menu-text"> ... </span>
              <i class="menu-arrow"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="topbar">
      <!-- @!include('pages.backend.__includes.component.topbar.search')
      @!include('pages.backend.__includes.component.topbar.notification')
      @!include('pages.backend.__includes.component.topbar.quickaction')
      @!include('pages.backend.__includes.component.topbar.quickpanel')
      @!include('pages.backend.__includes.component.topbar.chat') -->
      @include('pages.backend.__includes.component.topbar.language')
      @include('pages.backend.__includes.component.topbar.user')
    </div>
  </div>
</div>
