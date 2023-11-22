@if(session('success'))
    <div class="container-info">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
        </div>
    </div>
@endif
@if(session('error'))
    <div class="container-info">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
            </button>
            <h5><i class="icon fas fa-ban"></i> {{ session('error') }}</h5>
        </div>
    </div>
@endif
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="container-info">
            <div class="alert alert-danger dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                </button>
                <h5><i class="icon fas fa-ban"></i> {{ $error }}</h5>
            </div>
        </div>
    @endforeach
@endif
