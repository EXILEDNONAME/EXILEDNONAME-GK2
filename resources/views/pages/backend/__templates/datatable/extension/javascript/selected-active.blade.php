@if (empty($active) || $active == 'true')
$('.selected-active').on('click', function(e) {
  var exilednonameArr = [];
  $(".checkable:checked").each(function() { exilednonameArr.push($(this).attr('data-id')); });
  var strEXILEDNONAME = exilednonameArr.join(",");
  Swal.fire({ title: "{{ __('default.notification.confirm.are-you-sure') }}?", text: "{{ __('default.notification.confirm.selected-active') }}", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false}).then(function(result) {
    if (result.value) {
      $.ajax({
        url: "{{ URL::current() }}/selected-active", type: 'get', headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, data: 'EXILEDNONAME='+strEXILEDNONAME,
        success: function (data) {
          KTApp.block('#exilednoname_body', {
            overlayColor: '#000000',
            state: 'info',
            message: '{{ __('default.label.processing') }} ...'
          });
          setTimeout(function() {
            KTApp.unblock('#exilednoname_body');
            var oTable = $('#exilednoname_table').dataTable();
            $('#toolbar_delete').collapse('hide');
            $('#collapse_bulk').collapse('hide');
            oTable.fnDraw(false);
            toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
            toastr.success("{{ __('default.notification.success.selected-active') }}");
          }, 2000);
        },
        error: function (data) {
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.error("{{ __('default.notification.error./') }}");
        }
      });
    }
  });
});
@endif
