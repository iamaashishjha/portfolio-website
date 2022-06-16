<div class="tab-content__pane p-5 active" id="documents-content">

	{{-- Image, Signature and Citizenship --}}
	<h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Important
		Documents
		(जरुरि कागजात)</h1>
	<hr class="mt-5 mb-5">
	<div class="grid grid-cols-12 gap-2">
		<div class="col-span-12 lg:col-span-4">
			{{-- Profile Picture --}}
			<div class="mt-3">
				<div class="font-medium flex items-center">
					Upload Your Own Image
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>

				</div>
				<div class="mt-5">
					<div class="rounded-md pt-4 @error('own_image') border-theme-6 @enderror">
						<div class="flex flex-wrap px-4">
							<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
								<img class="rounded-md" alt="{{ isset($member) ? $member->name_en : '' }}"
									src="{{ isset($member) ? $member->doc_own_image : '/ar/dist/images/preview-6.jpg' }}"
									id="own_image">
							</div>
						</div>
						<div class="px-4 pb-4 flex items-center cursor-pointer relative">
							<i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 mr-1">Upload a
								file</span> or drag and drop
							<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
								onchange="ownImage(event)" name="own_image" value="{{ old('own_image') }}">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			{{-- Citizenship Front --}}
			<div class="mt-3">
				<div class="font-medium flex items-center">
					Upload Citizenshio's Front Image
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>

				</div>
				<div class="mt-5">
					<div class="rounded-md pt-4 @error('citizenship_front') border-theme-6 @enderror">
						<div class="flex flex-wrap px-4">
							<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
								<img class="rounded-md" alt="{{ isset($member) ? $member->name_en : '' }}"
									src="{{ isset($member) ? $member->doc_citizenship_front : '/ar/dist/images/preview-6.jpg' }}"
									id="citizenship_front">
							</div>
						</div>
						<div class="px-4 pb-4 flex items-center cursor-pointer relative">
							<i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 mr-1">Upload a
								file</span> or drag and drop
							<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
								onchange="citizenshipFront(event)" name="citizenship_front"
								value="{{ old('citizenship_front') }}">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			{{-- Citizenship Back --}}
			<div class="mt-3">
				<div class="font-medium flex items-center">
					Upload Citizenship's Back Image
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>

				</div>
				<div class="mt-5">
					<div class="rounded-md pt-4 items-center @error('citizenship_back') border-theme-6 @enderror">
						<div class="items-center content-center px-4">
							<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
								<img class="rounded-md" alt="{{ isset($member) ? $member->name_en : '' }}"
									src="{{ isset($member) ? $member->doc_citizenship_back : '/ar/dist/images/preview-6.jpg' }}"
									id="citizenship_back">
							</div>
						</div>
						<div class="px-4 pb-4 flex items-center cursor-pointer relative">
							<i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 mr-1">Upload a
								file</span> or drag and drop
							<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
								onchange="citizenshipBack(event)" name="citizenship_back"
								value="{{ old('citizenship_back') }}">
						</div>
					</div>
				</div>
			</div>
		</div>



	</div>
</div>