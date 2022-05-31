

@if ($paginator->hasPages())
<div class="post-pagination">

	@if ($paginator->onFirstPage())
		<a href="#" class="disabled">
			<i class="fa fa-angle-double-left"></i>
			<!-- /.fa fa-angle-double-left -->
		</a>
	@else
		<a href="{{ $paginator->previousPageUrl() }}">
			<i class="fa fa-angle-double-left"></i>
			<!-- /.fa fa-angle-double-left -->
		</a>
	@endif

	{{-- Pagination Elements --}}
	@foreach ($elements as $element)
		{{-- "Three Dots" Separator --}}
		@if (is_string($element))
			{{-- <a href="#" class="disabled">{{ $element }}</a> --}}
			<a href="#">...</a>
		@endif

		{{-- Array Of Links --}}
		@if (is_array($element))
			@foreach ($element as $page => $url)
				@if ($page == $paginator->currentPage())
					<a href="#" class="active">{{ $page }}</a>
				@else
					<a href="{{ $url }}">{{ $page }}</a>
				@endif
			@endforeach
		@endif
	@endforeach 

	{{-- Next Page Link --}}
	@if ($paginator->hasMorePages())
		<a href="{{ $paginator->nextPageUrl() }}">
			<i class="fa fa-angle-double-right"></i>
			<!-- /.fa fa-angle-double-left -->
		</a>
	@else
		<a href="#" aria-disabled="true">
			<i class="fa fa-angle-double-right"></i>
			<!-- /.fa fa-angle-double-left -->
		</a>
	@endif
</div>
@endif