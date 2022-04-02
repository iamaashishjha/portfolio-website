@if ($errors->any())
@php
$array = array($errors->all());
toast($array,'error');
@endphp
{{-- <script>
    var has_error = ({{ $array->count() > 0 ? "true" : }})

    If(has_error) {
        // toastr.error(session::has('error'))
		$.toast('Lets test some HTML stuff... <a href="#">github</a>');
    }
</script> --}}
{{-- @foreach ($errors->all() as $error)
<div class="modal" id="error-modal-preview">
    <div class="modal__content relative"> <a data-dismiss="modal" href="javascript:;" class="absolute right-0 top-0 mt-3 mr-3"> <i data-feather="x" class="w-8 h-8 text-gray-500"></i> </a>
        <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
            <div class="text-3xl mt-5">Modal Example</div>
            <div class="text-gray-600 mt-2">
				<ul>
					<li>{{ $error }}</li>
</ul>
Modal with close button
</div>
</div>
<div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
</div>
</div>
@endforeach --}}

{{-- <script>
	$( document ).ready(function() {
		$('#error-modal-preview').modal('show');
});
</script> --}}





@endif
