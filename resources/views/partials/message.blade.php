@php
$errors = $errors->all();
@endphp

@if($errors)

<div class="modal" id="error-modal-preview">
	<div class="modal__content">
		<div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
			@foreach ($errors as $error)
				<div class="text-gray-1000 mt-2">{{ $error }}</div>
			@endforeach
			{{-- <div class="text-3xl mt-5">Are you sure?</div>
			<div class="text-gray-600 mt-2">Do you really want to delete this post?</div> --}}
		</div>
		<div class="px-5 pb-8 text-center">
				<button type="button" data-dismiss="modal" class="button w-24 bg-theme-6 text-white">close</button>
		</div>
	</div>
</div>
<script src="/hr/assets/js/jquery.min.js"></script>
<script>
	$(document).ready(function() {
        $('#error-modal-preview').modal('show');
    });
</script>
@endif
{{-- <script src="/js/jquery-3.6.0.min.js"></script> --}}
