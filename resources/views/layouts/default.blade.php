<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('pages.backend.__includes.head')

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

  @include('pages.backend.__includes.mobile-header')

  <div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

      <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
        <div class="brand flex-column-auto" id="kt_brand">
          <a href="index.html" class="brand-logo">
            <h3 class="text-white">
              @php $title = DB::table('system_settings')->first(); @endphp
              {{ $title->name; }}
            </h3>
          </a>
        </div>
        @include('pages.backend.__includes.sidebar')
      </div>

      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        @include('pages.backend.__includes.header')
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          @include('pages.backend.__includes.subheader')

          <div class="d-flex flex-column-fluid">
            <div class="container-fluid">
              @stack('dashboard-widget')
              @stack('layout-content')
            </div>
          </div>

        </div>

        @include('pages.backend.__includes.footer')

      </div>
    </div>
  </div>

  @include('pages.backend.__includes.scroll-top')
  @include('pages.backend.__includes.sticky-toolbar')
  @include('pages.backend.__includes.js')

</body>
</html>
