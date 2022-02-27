<div class="row" style="margin-top: 20px">
    <div class="col-lg-2 col-md-2">
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">
        @if (Session::has('success'))
            <div class="alert alert-success border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                {{ session('success') }}
            </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                {{ session('warning') }}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                {{ session('error') }}
            </div>
        @elseif(Session::has('deleted'))
            <div class="alert alert-secondary border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                {{ session('deleted') }}
            </div>
        @endif
    </div>
    <div class="col-lg-2 col-md-2">
    </div>
</div>
