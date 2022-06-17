<div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 tab-content__pane" id="personal-content">

	<h1 class="text-4xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
		General
		Details (आम विवरण |)</h1>
	<hr class="mt-5 mb-5">

	<div class="grid grid-cols-12 gap-2">
		<div class="col-span-12 lg:col-span-4">
			<div class="mt-3">
				<div class="font-medium  @error('email') text-theme-6 @enderror  flex items-center">
					Email
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<div class="">
					<input type="text" class="input w-full border mt-2  @error('email') border-theme-6 @enderror"
						placeholder="Write Email Address (Email लेख्नुहोस |)" name="email" id="email"
						value="{{ isset($member) ? $member->email : old('email') }}">
					@error('email')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			<div class="mt-3">
				<div class="font-medium  @error('phone_number') text-theme-6 @enderror  flex items-center">
					Phone Number
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<div class="">
					<input type="text" class="input w-full border mt-2  @error('phone_number') border-theme-6 @enderror"
						placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="phone_number" id="phone_number"
						value="{{ isset($member) ? $member->phone_number : old('phone_number') }}">
					@error('phone_number')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			<div class="mt-3">
				<div class="font-medium  @error('mobile_number') text-theme-6 @enderror  flex items-center">
					Mobile Number
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<div class="">
					<input type="text"
						class="input w-full border mt-2  @error('mobile_number') border-theme-6 @enderror"
						placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="mobile_number" id="mobile_number"
						value="{{ isset($member) ? $member->mobile_number : old('mobile_number') }}">
					@error('mobile_number')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
		</div>
		{{-- <div class="col-span-12 lg:col-span-4">
			<div class="mt-3">
				<div class="font-medium  @error('cast') text-theme-6 @enderror  flex items-center">
					Cast (जाति)
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<div class="">
					<input type="text" class="input w-full border mt-2  @error('cast') border-theme-6 @enderror"
						placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="cast" id="cast"
						value="{{ isset($member) ? $member->cast : old('cast') }}">
					@error('cast')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-span-12 lg:col-span-4">
			<div class="mt-3">
				<div class="font-medium  @error('category') text-theme-6 @enderror  flex items-center">
					वर्ग
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<div class="">
					<input type="text" class="input w-full border mt-2  @error('category') border-theme-6 @enderror"
						placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="category" id="category"
						value="{{ isset($member) ? $member->category : old('category') }}">
					@error('category')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-span-12 lg:col-span-4">
			<div class="mt-3">
				<div class="font-medium  @error('category_source') text-theme-6 @enderror  flex items-center">
					वर्ग स्रोत
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<div class="">
					<input type="text"
						class="input w-full border mt-2  @error('category_source') border-theme-6 @enderror"
						placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="category_source" id="category_source"
						value="{{ isset($member) ? $member->category_source : old('category_source') }}">
					@error('category_source')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
		</div> --}}
		<div class="col-span-12 lg:col-span-4">
			<div class="mt-3">
				<div class="font-medium  @error('education_qualification') text-theme-6 @enderror  flex items-center">
					Education Qualification (शैक्षिक् योग्यता)
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<div class="mt-2">
					<select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full" name="education_qualification"
						id="education_qualification">
						<option hidden>Education Qualification (शैक्षिक् योग्यता)</option>
						<option value="1. सामान्य लेखपढ">1. सामान्य लेखपढ</option>
						<option value="2. प्राथमिक (१-५)">2. प्राथमिक (१-५)</option>
						<option value="3. निम्न माध्यमिक (६-८)">3. निम्न माध्यमिक (६-८)</option>
						<option value="4. माध्यमिक (९-१०)">4. माध्यमिक (९-१०)</option>
						<option value="5. एस.एल.सी वा सो सरह">5. एस.एल.सी वा सो सरह</option>
						<option value="6. उच्च माध्यमिक वा सो सरह">6. उच्च माध्यमिक वा सो सरह
						</option>
						<option value="7. स्नातक वा सो सरह">7. स्नातक वा सो सरह</option>
						<option value="8. स्नातकोत्तर वा सो भन्दा माथि ">8. स्नातकोत्तर वा सो भन्दा
							माथि </option>
						<option value="9. बिधावारिधी">9. बिधावारिधी</option>
						<option value="10. अन्य">10. अन्य</option>
						<option value="11. अनौपचारिक">11. अनौपचारिक</option>
						<option value="12. N/A">12. N/A</option>
					</select>
					@error('education_qualification')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			<div class="mt-3">
				<div class="font-medium  @error('blood_group') text-theme-6 @enderror  flex items-center">
					Blood Group (रक्त समूह )
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<div class="mt-2">
					<select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full" name="blood_group"
						id="blood_group">
						<option hidden>Blood Group (रक्त समूह)</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select>
					@error('blood_group')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

			</div>
		</div>
		<div class="col-span-12 lg:col-span-4">
			<div class="mt-3">
				<div class="font-medium  @error('other_identity') text-theme-6 @enderror  flex items-center">
					Other Identity (अन्य पहिचान)
					<span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
				</div>
				<div class="mt-2">
					<select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full" name="other_identity"
						id="other_identity">
						<option hidden>Other Identity (अन्य पहिचान)</option>
						<option value="1. घाइते">1. घाइते</option>
						<option value="2. अपाङ">2. अपाङ</option>
						<option value="3. सहिद परिवार">3. सहिद परिवार</option>
						<option value="4. वेपत्ता परिवार">4. वेपत्ता परिवार</option>
					</select>
					@error('other_identity')
					<span class="text-theme-6 mt-2" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
		</div>









	</div>
</div>