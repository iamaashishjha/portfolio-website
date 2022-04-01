@if ($errors->any())
<div class="row">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Errors</h1>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger">{{ $error }}</li>
@endforeach
</ul>
</div>
</div>
</div>
{{-- @foreach ($errors->all() as $error)
<script>
    $(document).ready(function() {
        var error = {
            !!json_encode($error) !!
        }
        Swal.fire({
            title: 'Error!'
            , text: error
            , icon: 'error'
            , confirmButtonText: 'Cool'
        })
    });

</script>
@endforeach --}}
@endif
