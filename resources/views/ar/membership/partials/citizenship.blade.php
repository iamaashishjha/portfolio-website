<div class="tab-content__pane p-5 active" id="citizenship-content">
	<h1 class="text-4xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
		Citizenship
		Based Details (नागरिकता आधारित विवरण|)</h1>
	<hr class="mt-5 mb-5">

	{{-- Name --}}
	<div class="grid grid-cols-2 gap-2">
		<div>
			<div
				class="font-medium mt-3  @error('name_en') text-theme-6 @enderror flex items-center">
				Full Name
				<span
					class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<input type="text"
				class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
				placeholder="Write Full Name in English" name="name_en" id="name_en"
				value="{{ isset($member->name_en) ? $member->name_en : old('name_en') }}">
			@error('name_en')
				<span class="text-theme-6 mt-2" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div>
			<div
				class="font-medium mt-3 ml-2  @error('name_lc') text-theme-6 @enderror  flex items-center">
				पुरा नाम
				<span
					class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<input type="text"
				class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
				placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="name_lc" id="name_lc"
				value="{{ isset($member->name_lc) ? $member->name_lc : old('name_lc') }}">
			@error('name_lc')
				<span class="text-theme-6 mt-2" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
	</div>

	{{-- Gender Birth Date --}}
	{{-- //::TODO Add Nepali Date Picker --}}
	<div class="grid grid-cols-3 gap-2">
		<div class="mt-3">
			<label class="font-medium mt-3  @error('gender_id') text-theme-6 @enderror">
				Gender (लिङ्ग)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
			</label>
			<div class="mt-2">
				<select data-placeholder="लिङ्ग छान्नुहोस् |" class="select2 w-full"
					name="gender_id" id="gender_id">
					<option hidden>Gender (लिङ्ग छान्नुहोस् |)</option>
					@foreach ($genders as $gender)
						<option value="{{ $gender->id }}"
							@if (isset($member)) @if ($member->gender->id == $gender->id) 
									selected @endif
							@endif>
							{{ $gender->name }}
						</option>
					@endforeach
				</select>
				@error('gender_id')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		<div class="mt-3">
			<label class="font-medium mt-3 @error('birth_date_ad') text-theme-6 @enderror">
				Birth Date in AD
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
			</label>
			<input class="datepicker input w-full border mt-2" name="birth_date_ad"
				placeholder="Select Date of Birth in AD" data-single="1"
				value="{{ isset($member->birth_date_ad) ? $member->birth_date_ad : old('birth_date_ad') }}">
		</div>
		<div class="mt-3">
			<label class="font-medium mt-3 @error('birth_date_bs') text-theme-6 @enderror">
				Birth Date in BS
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
			</label>
			<input type="text" class="nepalidatepicker input w-full border mt-2"
				name="birth_date_bs" placeholder="Select Date of Birth in BS"
				value="{{ isset($member) ? $member->birth_date_bs : old('birth_date_bs') }}"
				data-single="1">
			@error('birth_date_bs')
				<span class="text-theme-6 mt-2" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
	</div>

	{{-- Citizenship Issued Address --}}
	<div class="grid grid-cols-2 gap-2">
		{{-- Citizenship Issued Province --}}
		<div class="mt-3 mr-2">
			<label
				class="font-medium mt-3  @error('citizen_province_id') text-theme-6 @enderror">
				Citizenship Issued Province (नागरिकता प्राप्त प्रदेश)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
			</label>
			<div class="mt-2">
				<select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
					name="citizen_province_id" id="citizen_province_id"
					onchange="getDistrict('citizen')">
					<option hidden>--- नागरिकता प्राप्त प्रदेश छान्नुहोस् | ---</option>
					@foreach ($provinces as $province)
						<option value="{{ $province->id }}"
							@if (isset($member)) @if ($member->citizenProvince->id == $province->id)
						selected @endif
							@endif
							>{{ $province->name }}</option>
					@endforeach
				</select>
				@error('citizen_province_id')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

		{{-- Citizenship Issued District --}}
		<div class="mt-3 mr-2">
			<label
				class="font-medium mt-3 @error('citizen_district_id') text-theme-6 @enderror">
				Citizenship Issued District (नागरिकता प्राप्त जिल्ला)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
			</label>
			<div class="mt-2">
				<select data-placeholder="पहिला नागरिकता प्राप्त प्रदेश छान्नुहोस् |"
					class="select2 w-full items-center" name="citizen_district_id"
					id="citizen_district_id">
				</select>
				@error('citizen_district_id')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

	</div>

	{{-- Id Number --}}
	<div class="grid grid-cols-3 gap-2">
		<div>
			<div
				class="font-medium mt-3  @error('citizenship_number') text-theme-6 @enderror  flex items-center">
				Citizenship Number (नागरिकता प्र. प्र. नं.)
				<span
					class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<input type="text"
				class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
				placeholder="नागरिकता प्र. प्र. नं. लेख्नुहोस |" name="citizenship_number"
				id="citizenship_number"
				value="{{ isset($member->citizenship_number) ? $member->citizenship_number : old('citizenship_number') }}">
			@error('citizenship_number')
				<span class="text-theme-6 mt-2" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div>
			<div
				class="font-medium mt-3 ml-2  @error('passport_number') text-theme-6 @enderror  flex items-center">
				Passport Number
			</div>
			<input type="text"
				class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-"
				placeholder="Passport Number लेख्नुहोस |" name="passport_number"
				id="passport_number"
				value="{{ isset($member->passport_number) ? $member->passport_number : old('passport_number') }}">
			@error('passport_number')
				<span class="text-theme-6 mt-2" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div>
			<div
				class="font-medium mt-3 ml-2  @error('voter_id_number') text-theme-6 @enderror  flex items-center">
				Voter Id Number
			</div>
			<input type="text"
				class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-"
				placeholder="Voter Id Number लेख्नुहोस |" name="voter_id_number"
				id="voter_id_number"
				value="{{ isset($member->voter_id_number) ? $member->voter_id_number : old('voter_id_number') }}">
		</div>
	</div>

	{{-- Permnanent Address --}}
	<hr class="mt-5 mb-5">
	<h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Permanent
		Address
		(स्थायी ठेगाना |) </h1>
	<hr class="mt-5 mb-5">

	<div>
		<div class="grid grid-cols-3 gap-2">
			{{-- Province --}}
			<div class="mt-3 mr-2">
				<label
					class="font-medium mt-3 @error('perm_province_id') text-theme-6 @enderror">
					Province (प्रदेश)
					<span
						class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
				</label>
				<div class="mt-2">
					<select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
						name="perm_province_id" id="perm_province_id"
						onchange="getDistrict('perm')">
						<option hidden>प्रदेश छान्नुहोस्</option>
						@foreach ($provinces as $province)
							<option value="{{ $province->id }}"
								@if (isset($member)) @if ($member->permProvince->id == $province->id)
							selected @endif
								@endif
								>{{ $province->name }}</option>
						@endforeach
					</select>
					@error('perm_province_id')
						<span class="text-theme-6 mt-2" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			{{-- District --}}
			<div class="mt-3 mr-2">
				<label
					class="font-medium mt-3 @error('perm_district_id') text-theme-6 @enderror">
					District (जिल्ला)
					<span
						class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
				</label>
				<div class="mt-2">
					<select data-placeholder="पहिला नागरिकता प्राप्त प्रदेश छान्नुहोस् |"
						class="select2 w-full items-center" name="perm_district_id"
						id="perm_district_id" onchange="getLocalLevel('perm');">
					</select>
					@error('perm_district_id')
						<span class="text-theme-6 mt-2" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			{{-- LocalLevel --}}
			<div class="mt-3">
				<label
					class="font-medium mt-3 @error('perm_local_level_id') text-theme-6 @enderror">
					Local Level (स्थानीय तह)
					<span
						class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
				</label>
				<div class="mt-2">
					<select data-placeholder="पहिला जिल्ला छान्नुहोस् |"
						class="select2 w-full ml-2 mt-3" name="perm_local_level_id"
						id="perm_local_level_id" onchange="getLocalLevelType('perm')">
					</select>
					@error('perm_local_level_id')
						<span class="text-theme-6 mt-2" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
		</div>

		<div class="grid grid-cols-3 gap-2">
			{{-- Local Level Type --}}
			<div class="mt-3 mr-2">
				<div
					class="font-medium mt-3 ml-2  @error('perm_local_level_type_id') text-theme-6 @enderror  flex items-center">
					Local Level Type (प्रदेश)
					<span
						class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
				</div>
				<div class="mt-3">
					<select data-placeholder="पहिला स्थानीय तह छान्नुहोस् |"
						class="select2 w-full ml-2 mt-3" name="perm_local_level_type_id"
						id="perm_local_level_type_id" onchange="getDistrict()">
					</select>
					@error('perm_local_level_type_id')
						<span class="text-theme-6 mt-2" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			{{-- Ward Number --}}
			<div class="mt-3 ml-2 mr-2">
				<div
					class="font-medium mt-3 ml-2  @error('perm_ward_number') text-theme-6 @enderror  flex items-center">
					{{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
					Ward Number (वडा नम्बर)
					<span
						class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<input type="text"
					class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
					placeholder="Write Ward Number (वडा नम्बर लेख्नुहोस |)"
					name="perm_ward_number" id="perm_ward_number"
					value="{{ isset($member->perm_ward_number) ? $member->perm_ward_number : old('perm_ward_number') }}">
				@error('perm_ward_number')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			{{-- Tole Name --}}
			<div class="mt-3 ml-2">
				<div
					class="font-medium mt-3 ml-2  @error('perm_tole') text-theme-6 @enderror  flex items-center">
					{{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
					Tole (टोल)
					<span
						class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<input type="text"
					class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
					placeholder="Write Tole Name" name="perm_tole" id="perm_tole"
					value="{{ isset($member->perm_tole) ? $member->perm_tole : old('perm_tole') }}">
				@error('perm_tole')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

		</div>
	</div>

	{{-- Temporary Address --}}
{{-- @include('ar.membership.partials.citizen_tem_addr') --}}
</div>