@php $setting = DB::table('system_settings')->first(); @endphp
@if ($setting->sticky == '1')
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">

  <li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip"  title="Check out more demos" data-placement="right">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success" href="#">
      <i class="flaticon2-drop"></i>
    </a>
  </li>

  <li class="nav-item mb-2" data-toggle="tooltip" title="Layout Builder" data-placement="left">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" href="#" target="_blank">
      <i class="flaticon2-gear"></i>
    </a>
  </li>

  <li class="nav-item mb-2" data-toggle="tooltip" title="Documentation" data-placement="left">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning" href="#" target="_blank">
      <i class="flaticon2-telegram-logo"></i>
    </a>
  </li>

  <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Chat Example" data-placement="left">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-hover-danger" href="#" data-toggle="modal" data-target="#kt_chat_modal">
      <i class="flaticon2-chat-1"></i>
    </a>
  </li>

</ul>

<div id="kt_demo_panel" class="offcanvas offcanvas-right p-10">
  <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
    <h4 class="font-weight-bold m-0">
      Select A Demo
    </h4>
    <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
      <i class="ki ki-close icon-xs text-muted"></i>
    </a>
  </div>

  <div class="offcanvas-content">
    <div class="offcanvas-wrapper mb-5 scroll-pull"></div>
    <div class="offcanvas-footer">
      <a href="#" target="_blank" class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase"> ! </a>
    </div>
  </div>
</div>
@endif
