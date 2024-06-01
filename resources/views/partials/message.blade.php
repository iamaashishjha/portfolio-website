@php
if (Session::get('success')) {
$successMessage = Session::get('success');
} else {
$successMessage = null;
}

if (Session::get('error')) {
$errorMessage = Session::get('error');
} else {
$errorMessage = null;
}

if ($errors->any()) {
$errorsCollection = $errors->all();
} else {
$errorsCollection = null;
}
@endphp

{{-- @if($errors)

<div class="modal" id="error-modal-preview">
  <div class="modal__content">
    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
      @foreach ($errors as $error)
      <div class="text-gray-1000 mt-2">{{ $error }}</div>
      @endforeach
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
@endif --}}
{{-- <script src="/js/jquery-3.6.0.min.js"></script> --}}


@if ($successMessage)
<script>
  // BASESCRIPTS.showSwalMessage('{{ $successMessage }}');
        new Noty({
                            type: 'success'
                            , text: '{{ $successMessage }}'
                        }).show();
</script>
@endif

@if ($errorMessage)
<script>
  // BASESCRIPTS.showSwalMessage('{{ $errorMessage }}', 'error');
        new Noty({
                            type: 'error'
                            , text: '{{ $errorMessage }}'
                        }).show();
</script>
@endif

@if (!empty($errorsCollection))
@foreach ($errorsCollection as $error)
<script>
  // BASESCRIPTS.showNotyMessage('{{ $error }}', 'error');
            new Noty({
                            type: 'error'
                            , text: '{{ $error }}'
                        }).show();
</script>
@endforeach
@endif