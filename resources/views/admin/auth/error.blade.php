@if(Session::has('success'))
<div class="padding p-b-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success m-b-0">
      
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
</div>
@endif

@if(Session::has('fail'))
<div class="padding p-b-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger m-b-0 mt-2">

                {{ Session::get('fail') }}
            </div>
        </div>
    </div>
</div>
@endif


@if ($errors->any())
<div class="padding p-b-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger m-b-0 mt-2 error-msg">

                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif