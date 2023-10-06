<!DOCTYPE html>
<html lang="en" >
<head>
  <base href="../../../../">
  <meta charset="utf-8"/>
  <title>
    @php $title = DB::table('system_settings')->first(); @endphp
    @if (request()->is('dashboard')) {{ $title->name; }} - Dashboard
    @elseif (request()->is('login')){{ $title->name; }}
    @else {{ $title->name; }} - @stack('title')
    @endif
  </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Login page example"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
  <link href="/assets/backend/css/pages/login/classic/login-5.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link rel="shortcut icon" href="/assets/backend/media/logos/favicon.ico"/>
</head>

<body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

  <div class="d-flex flex-column flex-root">
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
      <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/assets/backend/media/bg/bg-2.jpg);">
        <div class="login-form text-center text-white p-7 position-relative overflow-hidden">

          <div class="login-signin text-dark">
            <div class="mb-10">
              <h3 class="opacity-40 font-weight-normal"> - LOGIN AREA - </h3>
              <p class="opacity-40"> Enter your details to login to your account </p>
            </div>

            <form class="form" method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Account" name="email" autocomplete="off" required/>
              </div>
              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" required/>
              </div>

              <center>
                @error('email')
                <ce
                <div class="fv-plugins-message-container mt-0">
                  <div data-field="password" class="fv-help-block"><strong>{{ $message }}</strong></div>
                </div>
                <br>
                @enderror

                @error('password')
                <div class="fv-plugins-message-container mt-0">
                  <div data-field="password" class="fv-help-block"><strong>{{ $message }}</strong></div>
                </div>
                <br>
                @enderror
              </center>

              <div class="form-group text-center d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                <div class="checkbox-inline">
                  <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                    <input type="checkbox" name="remember"/>
                    <span></span>
                    Remember me
                  </label>
                </div>
                <a href="/password/reset" class="text-white font-weight-bold">Forget Password ?</a>
              </div>
              <div class="form-group text-center mt-10">
                <button type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
              </div>
            </form>
            <hr>
            <a href="{{ route('redirect') }}" class="btn btn-danger"><i class="fab fa-google-plus-g"></i> Google</a>
            <a id="alert_facebook" class="btn btn-primary"><i class="fab fa-facebook"></i> Facebook</a>
            <hr>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
  var KTAppSettings = { "font-family": "Poppins" };
  </script>

  <script src="/assets/backend/plugins/global/plugins.bundle.js?v=7.0.6"></script>
  <script src="/assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
  <script src="/assets/backend/js/scripts.bundle.js?v=7.0.6"></script>
  <script>
    $("#alert_facebook").click(function (e) {
      Swal.fire({
        title: "Maintenance",
        text: "Not available at the moment!",
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "OK",
        customClass: {
          confirmButton: "btn btn-dark"
        }
      });
    });
  </script>

</body>
</html>
