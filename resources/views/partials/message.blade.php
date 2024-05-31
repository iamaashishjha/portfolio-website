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


  <!-- Toast -->
  {{-- <div class="max-w-xs bg-gray-800 text-sm text-white rounded-xl shadow-lg dark:bg-neutral-900" role="alert">
    <div class="flex p-4">
      Hello, world! This is a toast message.

      <div class="ms-auto">
        <button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100">
          <span class="sr-only">Close</span>
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
    </div>
  </div> --}}
  <!-- End Toast -->

{{-- 

<div id="toast-message-cta" class="w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400" role="alert">
    <div class="flex">
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese Leos image"/>
        <div class="ms-3 text-sm font-normal">
            <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Jese Leos</span>
            <div class="mb-2 text-sm font-normal">Hi Neil, thanks for sharing your thoughts regarding Flowbite.</div> 
            <a href="#" class="inline-flex px-2.5 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Reply</a>   
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-message-cta" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
</div> --}}

<script src="/hr/assets/js/jquery.min.js"></script>
<script>
	$(document).ready(function() {
        $('#error-modal-preview').modal('show');
    });

	
</script>
@endif
{{-- <script src="/js/jquery-3.6.0.min.js"></script> --}}
