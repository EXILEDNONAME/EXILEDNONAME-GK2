<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
  <div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">

    <div class="text-dark order-2 order-md-1">
      <span class="text-muted font-weight-bold mr-2">{{ \Carbon\Carbon::now()->format('Y') }}&copy;</span>
      <a href="#" target="_blank" class="text-dark-75 text-hover-primary">
        @php $title = DB::table('system_settings')->first(); @endphp
        {{ $title->name; }}
      </a>
    </div>

    <div class="nav nav-dark">
      <a href="#" target="_blank" class="nav-link pl-0 pr-5"> - </a>
    </div>

  </div>
</div>
