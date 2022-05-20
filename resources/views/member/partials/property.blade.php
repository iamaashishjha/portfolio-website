<div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 tab-content__pane" id="property-content">

	{{-- Income --}}
	<h1 class="text-4xl text-theme-9 font-medium leading-none mt-2 mb-2 text-center">Income Details (आय
		विवरण |)</h1>
	<hr class="mt-5 mb-5">

	<div class="grid grid-cols-2 gap-2">
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Profession
			</div>
			<div class="">
				<input type="text" class="input w-full border mt-2" placeholder="Write caption"
					name="profession" id="profession"
					value="{{ isset($member) ? $member->profession : old('profession') }}">
			</div>
		</div>
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Source of Income
			</div>
			<div class="">
				<input type="text" class="input w-full border mt-2" placeholder="Write caption"
					name="source_income" id="source_income"
					value="{{ isset($member) ? $member->source_income : old('source_income') }}">
			</div>
		</div>
	</div>

	{{-- Property --}}

	<hr class="mt-5 mb-5">
	<h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Property Details
		(सम्पति बिबरण |)
	</h1>
	<hr class="mt-5 mb-5">

	<div class="grid grid-cols-2 gap-2">
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Property in Cash (नगद सम्पत्ति)
			</div>
			<div class="">
				<input type="text" class="input w-full border mt-2" placeholder="Write caption"
					name="property_cash" id="property_cash"
					value="{{ isset($member->property_cash) ? $member->property_cash : old('property_cash') }}">
			</div>
		</div>
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Fixed Property (अचल सम्पति)
			</div>
			<div class="">
				<input type="text" class="input w-full border mt-2" placeholder="Write caption"
					name="property_fixed" id="property_fixed"
					value="{{ isset($member->property_fixed) ? $member->property_fixed : old('property_fixed') }}">
			</div>
		</div>
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Property in Share (सेयर सम्पत्ति)
			</div>
			<div class="">
				<input type="text" class="input w-full border mt-2" placeholder="Write caption"
					name="property_share" id="property_share"
					value="{{ isset($member->property_share) ? $member->property_share : old('property_share') }}">
			</div>
		</div>
		<div class="mt-3">
			<div class="font-medium flex items-center">
				Other Property (अन्य सम्पत्ति)
			</div>
			<div class="">
				<input type="text" class="input w-full border mt-2" placeholder="Write caption"
					name="property_other" id="property_other"
					value="{{ isset($member->property_other) ? $member->property_other : old('property_other') }}">
			</div>
		</div>
	</div>
</div>