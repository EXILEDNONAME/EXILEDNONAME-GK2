@if (!empty($status) && $status == 'true')
$('body').on('click', '.wa_status_progress', function () {
  var id = $(this).data("id");
  $.ajax({
    type: "get", url: "{{ URL::current() }}/wa-status-progress/"+id, processing: true, serverSide: true,
    success: function (data) {
      <!--  -->
    },
    error: function (data) {
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.error("{{ __('default.notification.error./') }}");
    }
  });
});
@endif
