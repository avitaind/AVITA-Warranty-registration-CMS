@if (session('success'))
    <div class="alert alert-success">
        <i class="ti-info-alt"></i> {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <i class="ti-info-alt"></i> {{ session('error') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        <i class="ti-info-alt"></i> {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
