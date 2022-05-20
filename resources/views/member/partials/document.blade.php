<div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 tab-content__pane" id="documents-content">

	{{-- Image, Signature and Citizenship --}}
	<h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Important
		Documents
		(जरुरि कागजात)</h1>
	<hr class="mt-5 mb-5">
	<div class="grid grid-cols-3 gap-2">
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
							<img class="rounded-md"
								alt="{{ isset($member) ? $member->name_en : '' }}"
								src="{{ isset($member) ? $member->doc_own_image : '/ar/dist/images/preview-6.jpg' }}"
								id="own_image">
						</div>
					</div>
					<div class="px-4 pb-4 flex items-center cursor-pointer relative">
						<i data-feather="image" class="w-4 h-4 mr-2"></i> <span
							class="text-theme-1 mr-1">Upload a file</span> or drag and drop
						<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
							onchange="ownImage(event)" name="own_image"
							value="{{ old('own_image') }}">
					</div>
				</div>
			</div>
		</div>
		{{-- Signature --}}
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Upload Signature Image
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>

			</div>
			<div class="mt-5">
				<div class="rounded-md pt-4 @error('sign_image') border-theme-6 @enderror">
					<div class="flex flex-wrap px-4">
						<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
							<img class="rounded-md"
								alt="{{ isset($member) ? $member->name_en : '' }}"
								src="{{ isset($member) ? $member->doc_sign_image : '/ar/dist/images/preview-6.jpg' }}"
								id="sign_image">
						</div>
					</div>
					<div class="px-4 pb-4 flex items-center cursor-pointer relative">
						<i data-feather="image" class="w-4 h-4 mr-2"></i> <span
							class="text-theme-1 mr-1">Upload a file</span> or drag and drop
						<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
							onchange="signImage(event)" name="sign_image"
							value="{{ old('sign_image') }}">
					</div>
				</div>
			</div>
		</div>
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
							<img class="rounded-md"
								alt="{{ isset($member) ? $member->name_en : '' }}"
								src="{{ isset($member) ? $member->doc_citizenship_front : '/ar/dist/images/preview-6.jpg' }}"
								id="citizenship_front">
						</div>
					</div>
					<div class="px-4 pb-4 flex items-center cursor-pointer relative">
						<i data-feather="image" class="w-4 h-4 mr-2"></i> <span
							class="text-theme-1 mr-1">Upload a file</span> or drag and drop
						<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
							onchange="citizenshipFront(event)" name="citizenship_front"
							value="{{ old('citizenship_front') }}">
					</div>
				</div>
			</div>
		</div>
		{{-- Citizenship Back --}}
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Upload Citizenship's Back Image
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>

			</div>
			<div class="mt-5">
				<div
					class="rounded-md pt-4 items-center @error('citizenship_back') border-theme-6 @enderror">
					<div class="items-center content-center px-4">
						<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
							<img class="rounded-md"
								alt="{{ isset($member) ? $member->name_en : '' }}"
								src="{{ isset($member) ? $member->doc_citizenship_back : '/ar/dist/images/preview-6.jpg' }}"
								id="citizenship_back">
						</div>
					</div>
					<div class="px-4 pb-4 flex items-center cursor-pointer relative">
						<i data-feather="image" class="w-4 h-4 mr-2"></i> <span
							class="text-theme-1 mr-1">Upload a file</span> or drag and drop
						<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
							onchange="citizenshipBack(event)" name="citizenship_back"
							value="{{ old('citizenship_back') }}">
					</div>
				</div>
			</div>
		</div>
		{{-- Passport Front --}}
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Upload Passport's Front Image
			</div>
			<div class="mt-5">
				<div class="rounded-md pt-4 @error('passport_front') border-theme-6 @enderror">
					<div class="flex flex-wrap px-4">
						<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
							<img class="rounded-md"
								alt="{{ isset($member) ? $member->name_en : '' }}"
								src="{{ isset($member) ? $member->doc_passport_front : '/ar/dist/images/preview-6.jpg' }}"
								id="passport_front">
						</div>
					</div>
					<div class="px-4 pb-4 flex items-center cursor-pointer relative">
						<i data-feather="image" class="w-4 h-4 mr-2"></i> <span
							class="text-theme-1 mr-1">Upload a file</span> or drag and drop
						<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
							onchange="passportFront(event)" name="passport_front"
							value="{{ old('passport_front') }}">
					</div>
				</div>
			</div>
		</div>
		{{-- Passport Back --}}
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Upload Passport's Back Image
			</div>
			<div class="mt-5">
				<div class="rounded-md pt-4 @error('passport_back') border-theme-6 @enderror">
					<div class="flex flex-wrap px-4">
						<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
							<img class="rounded-md"
								alt="{{ isset($member) ? $member->name_en : '' }}"
								src="{{ isset($member) ? $member->doc_passport_back : '/ar/dist/images/preview-6.jpg' }}"
								id="passport_back">
						</div>
					</div>
					<div class="px-4 pb-4 flex items-center cursor-pointer relative">
						<i data-feather="image" class="w-4 h-4 mr-2"></i> <span
							class="text-theme-1 mr-1">Upload a file</span> or drag and drop
						<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
							onchange="passportBack(event)" name="passport_back"
							value="{{ old('passport_back') }}">
					</div>
				</div>
			</div>
		</div>
		{{-- License --}}
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Upload License Image
			</div>
			<div class="mt-5">
				<div class="rounded-md pt-4 @error('license_image') border-theme-6 @enderror">
					<div class="flex flex-wrap px-4">
						<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
							<img class="rounded-md"
								alt="{{ isset($member) ? $member->name_en : '' }}"
								src="{{ isset($member) ? $member->doc_license_image : '/ar/dist/images/preview-6.jpg' }}"
								id="license_image">
						</div>
					</div>
					<div class="px-4 pb-4 flex items-center cursor-pointer relative">
						<i data-feather="image" class="w-4 h-4 mr-2"></i> <span
							class="text-theme-1 mr-1">Upload a file</span> or drag and drop
						<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
							onchange="licenseImage(event)" name="license_image"
							value="{{ old('license_image') }}">
					</div>
				</div>
			</div>
		</div>
		{{-- Pan Card Front --}}
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Upload Pan Card Front Image
			</div>
			<div class="mt-5">
				<div class="rounded-md pt-4 @error('pan_front') border-theme-6 @enderror">
					<div class="flex flex-wrap px-4">
						<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
							<img class="rounded-md"
								alt="{{ isset($member) ? $member->name_en : '' }}"
								src="{{ isset($member) ? $member->doc_pan_front : '/ar/dist/images/preview-6.jpg' }}"
								id="pan_front">
						</div>
					</div>
					<div class="px-4 pb-4 flex items-center cursor-pointer relative">
						<i data-feather="image" class="w-4 h-4 mr-2"></i> <span
							class="text-theme-1 mr-1">Upload a file</span> or drag and drop
						<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
							onchange="panFront(event)" name="pan_front"
							value="{{ old('pan_front') }}">
					</div>
				</div>
			</div>
		</div>
		{{-- Pan Card Back --}}
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Upload Pan Card Back Image
			</div>
			<div class="mt-5">
				<div class="rounded-md pt-4 @error('pan_back') border-theme-6 @enderror">
					<div class="flex flex-wrap px-4">
						<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
							<img class="rounded-md"
								alt="{{ isset($member) ? $member->name_en : '' }}"
								src="{{ isset($member) ? $member->doc_pan_back : '/ar/dist/images/preview-6.jpg' }}"
								id="pan_back">
						</div>
					</div>
					<div class="px-4 pb-4 flex items-center cursor-pointer relative">
						<i data-feather="image" class="w-4 h-4 mr-2"></i> <span
							class="text-theme-1 mr-1">Upload a file</span> or drag and drop
						<input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
							onchange="panBack(event)" name="pan_back" value="{{ old('pan_back') }}">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>