<hr class="mt-5 mb-5">
<h1 class="text-4xl text-theme-1 font-medium leading-none mt-2 mb-2 text-center">Temporary
	Address
	(अस्थायी ठेगाना |)</h1>
<hr class="mt-5 mb-5">

<div class="mt-5 mb-5">
	<div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
		<h5 class="text-lg ext-theme-9  font-medium leading-none mr-3">
			Is Permanent address Temporary address ?</h5>
		<input class="show-code input input--switch border" type="checkbox" id="perm_temp_address_chk"
			name="perm_temp_address_chk" {{ isset($category) ? $category->checkStatus() : '' }}
		onclick="sameAddress()">
	</div>
</div>

<div>
	<div class="grid grid-cols-12 gap-2">
		<div class="col-span-12 lg:col-span-4">
			{{-- Province --}}
		<div class="mt-3">
			<label class="font-medium mt-3 @error('temp_province_id') text-theme-6 @enderror">
				Province (प्रदेश)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
			</label>
			<div class="mt-2">
				<select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full" name="temp_province_id"
					id="temp_province_id" onchange="getDistrict('temp')">
					<option hidden>प्रदेश छान्नुहोस्</option>
					@foreach ($provinces as $province)
					<option value="{{ $province->id }}" @if (isset($member)) @if ($member->tempProvince->id ==
						$province->id)
						selected @endif
						@endif
						>{{ $province->name }}</option>
					@endforeach
				</select>
				@error('temp_province_id')
				<span class="text-theme-6 mt-2" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			{{-- District --}}
		<div class="mt-3">
			<label class="font-medium mt-3 @error('temp_district_id') text-theme-6 @enderror">
				District (जिल्ला)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
			</label>
			<div class="mt-2">
				<select data-placeholder="पहिला नागरिकता प्राप्त प्रदेश छान्नुहोस् |"
					class="select2 w-full items-center" name="temp_district_id" id="temp_district_id"
					onchange="getLocalLevel('temp');">
				</select>
				@error('temp_district_id')
				<span class="text-theme-6 mt-2" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			{{-- LocalLevel --}}
		<div class="mt-3">
			<label class="font-medium mt-3 @error('temp_local_level_id') text-theme-6 @enderror">
				Local Level (स्थानीय तह)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
			</label>
			<div class="mt-2">
				<select data-placeholder="पहिला जिल्ला छान्नुहोस् |" class="select2 w-full ml-2 mt-3"
					name="temp_local_level_id" id="temp_local_level_id" onchange="getLocalLevelType('temp')">
				</select>
				@error('temp_local_level_id')
				<span class="text-theme-6 mt-2" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>
		</div>
		
	</div>

	<div class="grid grid-cols-12 gap-2">
		
		<div class="col-span-12 lg:col-span-4">
			{{-- Local Level Type --}}
		<div class="mt-3">
			<div
				class="font-medium mt-3 ml-2  @error('temp_local_level_type_id') text-theme-6 @enderror  flex items-center">
				Local Level Type (प्रदेश)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
			</div>
			<div class="mt-3">
				<select data-placeholder="पहिला स्थानीय तह छान्नुहोस् |" class="select2 w-full ml-2 mt-3"
					name="temp_local_level_type_id" id="temp_local_level_type_id">
				</select>
				@error('temp_local_level_type_id')
				<span class="text-theme-6 mt-2" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			{{-- Ward Number --}}
		<div class="mt-3">
			<div
				class="font-medium mt-3 ml-2  @error('temp_ward_number') text-theme-6 @enderror  flex items-center">
				{{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
				Ward Number (वडा नम्बर)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
				placeholder="Write Ward Number" name="temp_ward_number" id="temp_ward_number"
				value="{{ isset($member->temp_ward_number) ? $member->temp_ward_number : old('temp_ward_number') }}">
			@error('temp_ward_number')
			<span class="text-theme-6 mt-2" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			{{-- Tole Name --}}
		<div class="mt-3">
			<div class="font-medium mt-3 ml-2  @error('temp_tole') text-theme-6 @enderror  flex items-center">
				{{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
				Tole (टोल)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
				placeholder="Write Tole Name" name="temp_tole" id="temp_tole"
				value="{{ isset($member->temp_tole) ? $member->temp_tole : old('temp_tole') }}">
			@error('temp_tole')
			<span class="text-theme-6 mt-2" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		</div>

	</div>
</div>