
	<div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 tab-content__pane" id="old-membership-content">
	{{-- Political History --}}
	<h1 class="text-4xl text-theme-9 font-medium leading-none mt-2 mb-2 text-center">Political Details
		(राजनैतिक विवरण |)
	</h1>
	<hr class="mt-5 mb-5">

	<div class="grid grid-cols-3 gap-2">
		<div class="mt-3">
			<div class="font-medium flex items-center @error('party_post') text-theme-6 @enderror">
				Haisiyat
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<div class="mt-3">
				<input type="text"
					class="input w-full border mt-2  @error('party_post') border-theme-6 @enderror"
					placeholder="Write caption" name="party_post" id="party_post"
					value="{{ isset($member->party_post) ? $member->party_post : old('party_post') }}">
					@error('party_post')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		<div class="mt-3">
			<div
				class="font-medium flex items-center @error('committee_name') text-theme-6 @enderror">
				Committee Name
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<div class="mt-3">
				<input type="text"
					class="input w-full border mt-2  @error('committee_name') border-theme-6 @enderror"
					placeholder="Write caption" name="committee_name" id="committee_name"
					value="{{ isset($member->committee_name) ? $member->committee_name : old('committee_name') }}">
					@error('committee_name')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		<div class="mt-3">
			<div class="font-medium flex items-center @error('party_lebidar') text-theme-6 @enderror">
				मासिक लेवी दर
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<div class="mt-3">
				<input type="text"
					class="input w-full border mt-2  @error('party_lebidar') border-theme-6 @enderror"
					placeholder="Write caption" name="party_lebidar" id="party_lebidar"
					value="{{ isset($member->party_lebidar) ? $member->party_lebidar : old('party_lebidar') }}">
					@error('party_lebidar')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		<div class="mt-3">
			<div
				class="font-medium flex items-center @error('party_joined_date_ad') text-theme-6 @enderror">
				संगठनको सदस्यता प्राप्त मिति(AD)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<div class="mt-3">
				<input class="datepicker input w-full border mt-2" name="party_joined_date_ad"
					value="{{ isset($member->party_joined_date_ad) ? $member->party_joined_date_ad : old('party_joined_date_ad') }}">
					@error('party_joined_date_ad')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		<div class="mt-3">
			<div
				class="font-medium flex items-center @error('party_joined_date_bs') text-theme-6 @enderror">
				संगठनको सदस्यता प्राप्त मिति(बि.सं.)
				<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
			</div>
			<div class="mt-3">
				<input class="nepalidatepicker input w-full border mt-2" name="party_joined_date_bs"
					value="{{ isset($member->party_joined_date_bs) ? $member->party_joined_date_bs : old('party_joined_date_bs') }}"
					data-single="1">
					@error('party_joined_date_bs')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
	</div>

	<div class="mt-3">
		<div class="font-medium flex items-center @error('party_location') text-theme-6 @enderror">
			Party Location
			<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
		</div>
		<div class="mt-3">
			<input type="text"
				class="input w-full border mt-2  @error('party_location') border-theme-6 @enderror"
				placeholder="Write caption" name="party_location" id="party_location"
				value="{{ isset($member->location) ? $member->party_location : old('party_location') }}">
				@error('party_location')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

		</div>
	</div>

	<div class="mt-3">
		<div
			class="font-medium flex items-center @error('political_background') text-theme-6 @enderror mt-3">
			Political Background (राजनीतिक पृष्ठभूमि)
			<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
		</div>
		<div class="mt-5">
			<textarea data-feature="all" class="summernote" data-height="550"
				name="political_background">{{ isset($member->political_background) ? $member->political_background : old('political_background') }}</textarea>
		</div>
	</div>

</div>