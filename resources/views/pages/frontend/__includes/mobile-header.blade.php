<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">

  <a href="#">
    <h3 class="text-white">
      @php $title = DB::table('system_settings')->first(); @endphp
      {{ $title->name; }}
    </h3>
  </a>

  <div class="d-flex align-items-center">
    <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
      <span></span>
    </button>

  </div>

</div>
