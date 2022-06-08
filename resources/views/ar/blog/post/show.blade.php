@extends('layouts.ar')

@section('title')
{{ isset($post) ? 'Edit Blog Post ' . '"' . $post->title . '". | Nagrik Unmukti Party' : 'Create New Blog Post | Nagrik Unmukti Party' }}


@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.blog.post.index') }}" class="">Blog Post</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">
        {{ isset($post) ? 'Edit New Blog Post ' . '"' . $post->title . '".' : 'Create New Blog Post' }}
    </a>
</div>
{{-- {{ dd($post) }} --}}
@endsection

@section('content')
<div class="intro-y news p-5 box mt-8">
	<!-- BEGIN: Blog Layout -->
	<h2 class="intro-y font-medium text-xl sm:text-2xl">
		{{ $post->title }}
	</h2>
	<div class="intro-y text-gray-700 mt-3 text-xs sm:text-sm">{{ $post->created_at->format('d M Y') }} <span class="mx-1">•</span> <a class="text-theme-1" href="">{{ $post->category->title }}</a> <span class="mx-1">•</span> 7 Min read </div>
	<div class="intro-y mt-6">
		<div class="news__preview image-fit">
			<img alt="{{ $post->description }}" class="rounded-md" src="{{ $post->image }}" >
		</div>
	</div>
	<div class="intro-y flex relative pt-16 sm:pt-6 items-center pb-6">
		<a href="" class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full border border-gray-500 text-gray-600 mr-3 tooltip" title="Bookmark"> <i data-feather="bookmark" class="w-3 h-3"></i> </a>
		<div class="intro-x flex mr-3">
			<div class="intro-x w-8 h-8 sm:w-10 sm:h-10 image-fit">
				<img alt="Midone Tailwind HTML Admin Template" class="rounded-full border border-white zoom-in tooltip" src="/ar/dist/images/preview-15.jpg" title="Robert De Niro " >
			</div>
			
		</div>
		<div class="absolute sm:relative -mt-12 sm:mt-0 w-full flex text-gray-700 text-xs sm:text-sm">
			<div class="intro-x mr-1 sm:mr-3"> Comments: <span class="font-medium">{{ count($post->comments) }}</span> </div>
			<div class="intro-x mr-1 sm:mr-3"> Views: <span class="font-medium">{{ $post->views }}</span> </div>
		</div>
		<a href="" class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto sm:ml-0 tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
		<a href="" class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full bg-theme-1 text-white ml-3 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
	</div>
	<div class="intro-y text-justify leading-relaxed">
		<p class="mb-5">
			{{ $post->content }}
		</p>
	</div>
	<div class="intro-y flex text-xs sm:text-sm flex-col sm:flex-row items-center mt-5 pt-5 border-t border-gray-200">
		<div class="flex items-center">
			<div class="w-12 h-12 flex-none image-fit">
				<img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
			</div>
			<div class="ml-3 mr-auto">
				<a href="" class="font-medium">{{ $post->createdUser->name }}</a>, Author 
				@if (isset($post->createdUser->designation))
				<div class="text-gray-600">{{ $post->createdUser->designation }}</div>
				@endif
			</div>
		</div>
		{{-- <div class="flex items-center text-gray-700 sm:ml-auto mt-5 sm:mt-0">
			Share this post: 
			<a href="" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border ml-2 text-gray-500 zoom-in tooltip" title="Facebook"> <i class="w-3 h-3 fill-current" data-feather="facebook"></i> </a>
			<a href="" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border ml-2 text-gray-500 zoom-in tooltip" title="Twitter"> <i class="w-3 h-3 fill-current" data-feather="twitter"></i> </a>
			<a href="" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border ml-2 text-gray-500 zoom-in tooltip" title="Linked In"> <i class="w-3 h-3 fill-current" data-feather="linkedin"></i> </a>
		</div> --}}
	</div>
	<!-- END: Blog Layout -->
	{{-- <!-- BEGIN: Comments -->
	<div class="intro-y mt-5 pt-5 border-t border-gray-200">
		<div class="text-base sm:text-lg font-medium">2 Responses</div>
		<div class="news__input relative mt-5">
			<i data-feather="message-circle" class="w-5 h-5 absolute my-auto inset-y-0 ml-6 left-0 text-gray-600"></i> 
			<textarea class="input w-full bg-gray-200 pl-16 py-6 placeholder-theme-13 resize-none" rows="1" placeholder="Post a comment..."></textarea>
		</div>
	</div>
	<div class="intro-y mt-5 pb-10">
		<div class="pt-5">
			<div class="flex">
				<div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit">
					<img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
				</div>
				<div class="ml-3 flex-1">
					<div class="flex items-center"> <a href="" class="font-medium">Robert De Niro</a> <a href="" class="ml-auto text-xs text-gray-600">Reply</a> </div>
					<div class="text-gray-600 text-xs sm:text-sm">45 minutes ago</div>
					<div class="mt-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
				</div>
			</div>
		</div>
		<div class="mt-5 pt-5 border-t border-gray-200">
			<div class="flex">
				<div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit">
					<img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
				</div>
				<div class="ml-3 flex-1">
					<div class="flex items-center"> <a href="" class="font-medium">Christian Bale</a> <a href="" class="ml-auto text-xs text-gray-600">Reply</a> </div>
					<div class="text-gray-600 text-xs sm:text-sm">38 minutes ago</div>
					<div class="mt-2">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Comments --> --}}
</div>
@endsection