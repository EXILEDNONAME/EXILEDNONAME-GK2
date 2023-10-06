@extends('layouts.default')

@push('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@push('layout-content')
<center>
	<input type="text" name="email" id="email"><br><br>
	<button type="submit" id="show-user"> OK </button>

	<div class="animation"><img src="/assets/loading-screen.gif"></div>
	<div class="content">
		<span id="user-id"></span></p>
		<span id="user-name"></span></p>
		<span id="user-email"></span></p>
	</div>
</center>
@endpush

@push('js')
<script type="text/javascript">
$(document).ready(function () {
	$('.animation').hide();
});
</script>

<script>
$('body').on('click', '#show-user', function () {
	var id = $(this).data("id");
	var email = $("#email").val();
	$('.content').hide();
	$('.animation').show();
	$.ajax({
		type: "get",
		url: "{{ URL::current() }}/"+email,
		processing: true,
		serverSide: true,

		success: function (data) {
			if (data.id) {
				setTimeout(function(){
					$('.content').show();
					$('#user-id').text(data.id);
					$('#user-name').text(data.name);
					$('#user-email').text(data.email);
					$('.animation').hide();
				}, 5000);
			}
			else {
				setTimeout(function(){
					alert('error');
					$('.animation').hide();
				}, 5000);
			}
		}
	});
});
</script>
@endpush
