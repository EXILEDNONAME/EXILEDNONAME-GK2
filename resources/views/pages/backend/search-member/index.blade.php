@extends('layouts.default')
@section('title', 'Search Members')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.search-members') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>

        <div class="card-body" style="">

          <div id="search" class="input-group text-center">
            <input name="email" id="email" type="text" class="form-control submit_on_enter" placeholder="Type ID Bigo ..." required>
            <div class="input-group-append">
              <button type="submit" id="show-user" class="btn btn-primary"> Search </button>
            </div>
          </div>

          <div class="animation text-center" style="display: none;"><img src="/assets/loading-screen.gif"></div>
          <div class="content" style="display: none;">
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

          <div class="content-notfound text-center font-weight-bold" style="display: none;">
            <hr>
            That Account Not Found ...
          </div>

        </div>

    </div>
  </div>
</div>

@endsection

@push('js')
<script type="text/javascript">
$(document).ready(function () {
  $('.animation').hide();
  $('.content').hide();
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

          // if (data.verify == '0') { $('#user-verify').html('<i class="flaticon2-cancel-music text-danger"> No </i>  '); }
          // if (data.verify == '1') { $('#user-verify').html('<i class="flaticon2-correct text-success"></i>'); }
          // if (data.verify == '2') { $('#user-verify').html('<i class="flaticon2-cancel-music text-danger"> No </i>  '); }

          // if (data.official == '0') { $('#user-official').html('<i class="flaticon2-cancel-music text-danger"> No </i>  '); }
          // if (data.official == '1') { $('#user-official').html('<i class="flaticon2-correct text-success"></i>'); }
          // if (data.official == '2') { $('#user-official').html('<i class="flaticon2-cancel-music text-danger"> No </i>  '); }

          if (data.verify == '0') { $('#user-verify').html('No'); }
          if (data.verify == '1') { $('#user-verify').html('Yes'); }
          if (data.verify == '2') { $('#user-verify').html('No'); }

          if (data.official == '0') { $('#user-official').html('No'); }
          if (data.official == '1') { $('#user-official').html('Yes'); }
          if (data.official == '2') { $('#user-official').html('No'); }

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
@endpush
