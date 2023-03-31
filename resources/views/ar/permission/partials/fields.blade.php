@php
    $results = \App\Models\Permission::all();
    $options = \App\Models\Permission::all()
        ->pluck('name', 'id')
        ->toArray();
    $permission_collection = [];
    foreach ($options as $key => $name) {
        $entity_arr = explode(' ', $name);
        $permission_collection[end($entity_arr)][$key] = $entity_arr[0];
    }
@endphp

<div>
    <label class="font-weight-normal" style="cursor: pointer">
        <input id="allCheck" type="checkbox" class="input border mr-2 checkbox-checkall-check" onclick="checkAllAlls()">&nbsp;Check All
    </label>
</div>

@foreach ($permission_collection as $key => $collection)
    @php
        $classId = $loop->iteration;
    @endphp
        <div class="mt-3">
            <div class="flex flex-col sm:flex-row mt-2 justify-items-start">
                <div class="flex items-center text-gray-700 mr-2 w-40">
                    <label class="cursor-pointer select-none">{{ $key }}</label>
                </div>
                <div class="flex items-center text-gray-700 mr-2">
                    <input type="checkbox" id="checkall-{{ $classId }}" class="input border mr-2 checkbox-checkall-check-child checkall-{{ $classId }}" onclick="checkall({{ $classId }})" type="checkbox" id="{{$key}}">
                    <label class="cursor-pointer select-none" for="checkall-{{ $classId }}">
                        All
                    </label>
                </div>
                @foreach ($collection as $identifier => $option)


                    @php
                        $string  = $collection[$identifier]. ' '. $key;
                        $permission = \App\Models\Permission::where('name', $string)->first();
                        $checkstatus = \App\Traits\AuthTrait::checkPermissionInputFields($permission, $role);
                    @endphp


                <div class="flex items-center text-gray-700 mr-2">
                    <input type="checkbox" class="input border mr-2 checkbox-checkall-check-child checkall-checkbox-{{ $classId }}" id="permission-name-{{ $permission->id }}" name="permissions[{{ $permission->id }}]" {{ $checkstatus }}>
                    <label class="cursor-pointer select-none" for="permission-name-{{ $permission->id }}">{{ $option }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
@endforeach

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            // alert(actionType);
            // checkAllAlls();
            // var modalId = document.getElementById('create-modal');
            // document.getElementById('create-modal').classList.toggle('hidden');
            // modalDismissal(modalId);
        });
    </script>

    <script>

        function checkall(key) {
            var checkboxParentClass = '.checkall-'+ key;
            var checkboxChildClass = '.checkall-checkbox-'+ key;

            if ($(checkboxParentClass).is(':checked')) {
                $(checkboxChildClass).attr('checked', true);
            } else {
                $(checkboxChildClass).attr('checked', false);
            }
        }

        function checkAllAlls() {
            if ($('.checkbox-checkall-check').is(':checked')) {
                $('.checkbox-checkall-check-child').attr('checked', true);
            } else {
                $('.checkbox-checkall-check-child').attr('checked', false);
            }
        }

        function action(actionType) {
            // debugger;
            // if(actionType != 'edit'){
            //     checkAllAlls();
            // }
        }

        function modalDismissal(modalId) {
            debugger;
            // const targetEl = modalId;
            // const options = {
            //     placement: 'bottom-right',
            //     backdrop: 'dynamic',
            //     backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
            //     onHide: () => {
            //         debugger;
            //         console.log('modal is hidden');
            //     },
            //     onShow: () => {
            //         debugger;
            //         console.log('modal is shown');
            //     },
            //     onToggle: () => {
            //         debugger;
            //         console.log('modal has been toggled');
            //     }
            // };
            // debugger;
            /*
                * targetEl: required
                * options: optional
            */
            // const modal = new Modal(targetEl, options);
            // debugger;
            // modal.show();
            // debugger;
            // var modalstatus = modal.isHidden();
            debugger;
        }
    </script>

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
