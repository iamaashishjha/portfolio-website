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

@endif
