@extends("layouts.master")

@section("content")
@include("layouts.nav")
<div class="mt-5 pt-4"></div>

<div class="container pt-5 mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
@include("layouts.report_message")
            <div class="card p-5">
                <h2 class="pt-4 text-info text-center">Register</h2>
                <form action="{{URL_ROOT}}user/register" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                    <div class="d-flex justify-content-between">
                        <a href="{{URL_ROOT}}user/login">
                            Already a member, login
                        </a>
                        <div>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            <button class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

