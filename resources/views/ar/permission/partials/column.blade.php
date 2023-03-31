{{-- relationships with pivot table (n-n) --}}
@php

if (isset($roles)) {
        $results = $role->permissions;
    }else{
        $results = \App\Models\Permission::all();
    }
    $results_array = [];
    if (!$results->isEmpty()) {
        $results_array = $results->pluck('name', 'id')->toArray();
    }

    foreach ($results_array as $key => $text) {
        $results_array[$key] = $text;
    }

    $permission_collection = [];
    foreach ($results_array as $key => $name) {
        $entity_arr = explode(' ', $name);
        $permission_collection[end($entity_arr)][] = $entity_arr[0];
    }
@endphp

<span>
    @if (!empty($permission_collection))
        @foreach ($permission_collection as $key => $text)
            <span>
                <div class="font-medium leading-none">
                    <span class="text-theme-1 font-extrabold leading-none" style="line-height: 1.5rem;">
                        {{ $key }}
                        &nbsp;&nbsp;
                    </span>
                    =>
                    &nbsp;&nbsp;
                    {{ implode('  ,  ', $text) }}
                </div>
            </span>
        @endforeach
    @else
        -
    @endif
</span>
