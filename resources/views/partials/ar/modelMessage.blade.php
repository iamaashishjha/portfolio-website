@if ($errors->any())
    {{-- <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}
	<div class="modal" id="errors-modal-preview">
		<div class="modal__content">
			<div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
				<div class="text-3xl mt-5">Errors</div>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
				{{-- <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div> --}}
			</div>
			{{-- <div class="px-5 pb-8 text-center">
				<form action="{{ route('category.destroy', $category->id) }}" method="post">
					@csrf
					@method('DELETE')
					<button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
					<button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
				</form>
			</div> --}}
		</div>
	</div>
@endif

