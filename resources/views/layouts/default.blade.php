<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('pages.backend.__includes.head')
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  @include('pages.backend.__includes.mobile-header')
  <div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
      @include('pages.backend.__includes.sidebar')
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        @include('pages.backend.__includes.topbar')
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          @include('pages.backend.__includes.subheader')
          <div class="d-flex flex-column-fluid">
            <div class="container-fluid">

              <!-- CONTENT -->
              @yield('content')
              <!-- END CONTENT -->

            </div>
          </div>
        </div>

        @include('pages.backend.__includes.footer')
      </div>
    </div>
  </div>

  @include('pages.backend.__includes.side-quickpanel')
  @include('pages.backend.__includes.side-chatpanel')
  @include('pages.backend.__includes.scrolltop')
  @include('pages.backend.__includes.sticky-toolbar')
  @include('pages.backend.__includes.side-demopanel')
  @include('pages.backend.__includes.js')

</body>
</html>
