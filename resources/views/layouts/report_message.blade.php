@if(isset($errors))
    <ul style="list-style-type : none;">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>   
    @foreach($errors as $err)
    <ul>
        <li><strong>{{$err}}</strong></li>
    </ul>
    @endforeach
        </div>
    </ul>
@endif


@if(isset($_SESSION['success']))

<ul style="list-style-type : none;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{\App\Classes\Session::flash('success')}}</strong>
    </div>
</ul>
@endif
@if(isset($_SESSION['fail']))

<ul style="list-style-type : none;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{\App\Classes\Session::flash('success')}}</strong>
    </div>
</ul>
@endif

@if(isset($_SESSION['delete_success']))
<ul style="list-style-type : none;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{\App\Classes\Session::flash('delete_success')}}</strong>
    </div>
</ul>
@endif

@if(isset($_SESSION['delete_fail']))
<ul style="list-style-type : none;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{\App\Classes\Session::flash('delete_fail')}}</strong>
    </div>
</ul>

@endif