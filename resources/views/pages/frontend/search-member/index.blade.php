<!DOCTYPE html>
<html lang="en" >
<head><base href="../../../../">
  <meta charset="utf-8"/>
  <title> ᴺᵉʷ𝐆𝐀𝐒𝐒𝐊𝐄𝐄𝐍 🔥 </title>
  <meta name="description" content="Login page example"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->
  <link href="/assets/backend/css/pages/login/classic/login-5.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="/assets/backend/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="shortcut icon" href="/assets/backend/media/logos/favicon.ico"/>
</head>
<body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

  <div class="d-flex flex-root">
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
      <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/assets/backend/media/bg/bg-2.jpg);">
        <div class="login-form p-5 text-white position-relative overflow-hidden">

            <div class="mb-10 text-center">
              <h3 class="opacity-40 font-weight-normal"> Search Member </h3>
              Contact Administrator For Verify Account
              <hr>
            </div>

            <div id="search" class="input-group text-center">
              <input name="email" id="email" type="text" class="form-control submit_on_enter" placeholder="Search for member ..." required>
              <div class="input-group-append">
                <button type="submit" id="show-user" class="btn btn-primary"> Search </button>
              </div>
            </div>

            <div class="login-signup mt-0 p-8">
              <div class="animation text-center"><img src="/assets/loading-screen.gif"></div>
              <div class="content">
                <hr>
                <table width="100%">
                  <tr><td> Registered : <span id="user-date-join"></span> </td></tr>
                  <tr><td> ID Bigo : <span id="user-id-bigo"></span> </td></tr>
                  <tr><td> Name : <span id="user-name"></span> </td></tr>
                  <tr><td> Area : <span id="user-area"></span> </td></tr>
                  <tr><td> Verified : <span id="user-verify"></span> </td></tr>
                  <tr><td> Official Host : <span id="user-official"></span> </td></tr>
                </table>
              </div>

              <div class="content-notfound text-center">
                <hr>
                That Account Not Found ...
              </div>
            </div>

            <a href="/"><button type="button" class="btn btn-primary btn-block mt-10"> Back </button></a>


        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(document).ready(function () {
    $('.animation').hide();
    $('.content-notfound').hide();

    var input = document.getElementById("search");
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("show-user").click();
      }
    });
  });

  </script>

  <script>
  $('body').on('click', '#show-user', function () {
    var id = $(this).data("id");
    var email = $("#email").val();
    $('.content').hide();
    $('.animation').show();
    $('.content-notfound').hide();
    $('.login-signin').hide();
    $('.login-signup').show();
    $.ajax({
      type: "get",
      url: "{{ URL::current() }}/"+email,
      processing: true,
      serverSide: true,
      success: function (data) {
        if (data.id) {
          setTimeout(function(){
            $('.content').show();
            $('#user-id-bigo').text(data.id_bigo);
            $('#user-id').text(data.id);
            $('#user-name').text(data.name);
            $('#user-email').text(data.email);
            $('#user-area').text(data.area);
            $('#user-date-join').text(data.date_join);

            if (data.verify == '0') { $('#user-verify').html('<i class="flaticon2-cancel-music text-danger"> No </i>  '); }
            if (data.verify == '1') { $('#user-verify').html('<i class="flaticon2-correct text-success"></i>'); }
            if (data.verify == '2') { $('#user-verify').html('<i class="flaticon2-cancel-music text-danger"> No </i>  '); }

            if (data.official == '0') { $('#user-official').html('<i class="flaticon2-cancel-music text-danger"> No </i>  '); }
            if (data.official == '1') { $('#user-official').html('<i class="flaticon2-correct text-success"></i>'); }
            if (data.official == '2') { $('#user-official').html('<i class="flaticon2-cancel-music text-danger"> No </i>  '); }

            $('.animation').hide();
            $('.content-notfound').hide();
          }, 5000);
        }
        else {
          setTimeout(function(){
            // Swal.fire("Good job!", "You clicked the button!", "error");
            $('.content-notfound').show();
            $('.animation').hide();
          }, 5000);
        }
      }
    });
  });
  </script>

  <script>
  var KTAppSettings = { "font-family": "Poppins" };
  </script>

  <script src="/assets/backend/plugins/global/plugins.bundle.js?v=7.0.6"></script>
  <script src="/assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
  <script src="/assets/backend/js/scripts.bundle.js?v=7.0.6"></script>
  <script src="/assets/backend/js/pages/features/miscellaneous/sweetalert2.js?v=7.0.6"></script>

</body>
</html>
