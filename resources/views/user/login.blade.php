@extends("layouts.master")

@section("content")
@include("layouts.nav")

<div class="container pt-5 mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card p-5">
            @include("layouts.report_message")
                <h2 class="pt-4 text-info text-center">Login</h2>
                <form action="{{URL_ROOT}}user/login" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                    <div class="d-flex justify-content-between">
                        <a href="{{URL_ROOT}}user/register">
                            Not a user yet, register
                        </a>
                        <div>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

