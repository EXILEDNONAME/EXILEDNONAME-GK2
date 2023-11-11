@if(!empty($chart) && $chart == 'true')
$("#chart-refresh").on("click", function() {
  KTApp.block('#exilednoname_chart', {
    overlayColor: '#000000',
    state: 'primary',
    message: "{{ __('default.label.please-wait') }} ..."
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_chart');
  }, 2000);
});
@endif
