<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="/ar/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Create New Member</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/ar/dist/css/app.css" />
    <style>
        .tab {
            display: none;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D!important;
            color: white!important;
        }

        .step.current{
            background-color: #1C3FAA!important;
            color: white!important;
        }

    </style>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    <div class="flex">
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="flex items-center mt-8">
                <h2 class="intro-y text-lg font-medium mr-auto">
                    नया सदस्यताता को लागि Online फोरम भर्नुहोस् |
                </h2>
            </div>
            <form action="/" id="membershipForm" method="POST" >
                @csrf
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box py-10 sm:py-20 mt-5">
                    <div class="wizard flex flex-col lg:flex-row justify-center px-5 sm:px-20">
                        <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
                            <button class="w-10 h-10 rounded-full button text-white bg-theme-1 step" disabled>1</button>
                            <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Citizenship</div>
                        </div>
                        <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                            <button class="w-10 h-10 rounded-full button text-gray-600 bg-gray-200 step" disabled>2</button>
                            <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Personal</div>
                        </div>
                        <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                            <button class="w-10 h-10 rounded-full button text-gray-600 bg-gray-200 step" disabled>3</button>
                            <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Income / Property
                            </div>
                        </div>
                        <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                            <button class="w-10 h-10 rounded-full button text-gray-600 bg-gray-200 step" disabled>4</button>
                            <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Political</div>
                        </div>
                        <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                            <button class="w-10 h-10 rounded-full button text-gray-600 bg-gray-200 step" disabled>5</button>
                            <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Documents</div>
                        </div>
                        <div class="wizard__line hidden lg:block w-2/3 bg-gray-200 absolute mt-5"></div>
                    </div>
                    <div class="tab">
                        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 ">
                            <h1 class="text-4xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">Citizenship
                                Based Details (नागरिकता अनुशारको विवरण |)</h1>
                            <hr class="mt-5 mb-5">
                            {{-- <div class="font-medium text-base ">Citizenship</div> --}}
                            <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">From</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">To</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Subject</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Important Meeting">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Has the Words</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Doesn't Have</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation">
                                </div>
                                
                            </div>

                            <hr class="mt-5 mb-5">
                        <h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Permanent Address
                            (स्थायी ठेगाना |) </h1>
                        <hr class="mt-5 mb-5">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">From</div>
                                <input type="text" class="input w-full border flex-1"
                                    placeholder="example@gmail.com">
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">To</div>
                                <input type="text" class="input w-full border flex-1"
                                    placeholder="example@gmail.com">
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Subject</div>
                                <input type="text" class="input w-full border flex-1"
                                    placeholder="Important Meeting">
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Has the Words</div>
                                <input type="text" class="input w-full border flex-1"
                                    placeholder="Job, Work, Documentation">
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Doesn't Have</div>
                                <input type="text" class="input w-full border flex-1"
                                    placeholder="Job, Work, Documentation">
                            </div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 ">
                            {{-- <div class="font-medium text-base ">Personal</div> --}}
                            <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">From</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">To</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Subject</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Important Meeting" >
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Has the Words</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation" >
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Doesn't Have</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation" >
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 ">
                            {{-- <div class="font-medium text-base ">Personal</div> --}}
                            <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">From</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com"  >
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">To</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com" >
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Subject</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Important Meeting"  >
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Has the Words</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation"  >
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Doesn't Have</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation"  >
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 ">
                            {{-- <div class="font-medium text-base ">Personal</div> --}}
                            <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">From</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">To</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Subject</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Important Meeting">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Has the Words</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Doesn't Have</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 ">
                            {{-- <div class="font-medium text-base ">Personal</div> --}}
                            <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">From</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">To</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Subject</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Important Meeting">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Has the Words</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6">
                                    <div class="mb-2">Doesn't Have</div>
                                    <input type="text" class="input w-full border flex-1"
                                        placeholder="Job, Work, Documentation">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <button class="button w-24 justify-center block bg-theme-6 text-white ml-2"
                    type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button class="button w-24 justify-center block bg-theme-1 text-white ml-2"
                    type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
                <!-- END: Wizard Layout -->
            </form>

        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="/ar/dist/js/app.js"></script>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {

            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }

            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("membershipForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");

            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }

            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {

            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");

            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace("current", "");
            }
            x[n].className += " current";
        }
    </script>
    <!-- END: JS Assets-->
</body>

</html>
