@extends('front.layout')

@section('content')
<div class="clearfix"></div>
    <div id="page_videos">
        <div class="about-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-xs-12">
                        <div class="login_page">
                            <div class="img-div">
                                <img class="img-responsive" src="{!!Url('front/')!!}/images/logo-top.png">

                            </div>
                             @if (count($errors) > 0)
								<div class="alert alert-danger">
									{!!Lang::get('assets.whoops')!!}
									<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
                            <h3>{!!Lang::get('index.sign_up')!!}</h3>
                            @if(Session::has('success'))
								<div class="alert alert-success">
									{!!Lang::get('assets.reg_success')!!}
								</div>
                            @endif
                            <div class="login-details">
                                <div class="col-md-12 col-xs-12">
                                   {!!Form::open()!!}
                                        <div class="form-group">
                                            <input type="text" name="firstname" class="form-control" id="text" placeholder="Firstname">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lastname" class="form-control" id="text" placeholder="Lastname">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" id="text" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="text" placeholder="Email">
                                        </div>

                                        <div class="form-group">

                                            <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                                        </div>

                                        <div class="checkbox">
                                            
                                        </div>
                                        <div class="button-bottom">

                                            <button type="submit" class="btn btn-default hvr-bounce-to-bottom">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!--end-login-div-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@stop