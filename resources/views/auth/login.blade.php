
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Login Options - Login Form 4</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
{!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')!!}
{!! Html::style('back/assets/global/plugins/font-awesome/css/font-awesome.min.css')!!}
{!! Html::style('back/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')!!}
{!! Html::style('back/assets/global/plugins/bootstrap/css/bootstrap.min.css')!!}
{!! Html::style('back/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')!!}
{!! Html::style('back/assets/global/plugins/uniform/css/uniform.default.css')!!}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
{!! Html::style('back/assets/global/plugins/select2/select2.css')!!}
{!! Html::style('back/assets/admin/pages/css/login-soft.css')!!}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
{!! Html::style('back/assets/global/css/components-md.css')!!}
{!! Html::style('back/assets/global/css/plugins-md.css')!!}
{!! Html::style('back/assets/admin/layout/css/layout.css')!!}
{!! Html::style('back/assets/admin/layout/css/themes/default.css')!!}
{!! Html::style('back/assets/admin/layout/css/custom.css')!!}


<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN LOGO -->
<div class="logo">
	<h2 style="color:white"><span style="color:red">MoT</span>wreen</h2>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
@if(Session::has('msg'))
<div id="notify" >
	<div id="login-status" class="error-notice info" style="visibility: visible; opacity: 1;">
	    <div class="content-wrapper">
	        <div id="login-detail">
	            <div id="login-status-icon-container">
	            	<i class="fa fa-info-circle"></i>
            	</div>
	            <ul id="login-status-message" class="list-unstyled">{{Session::get('msg')}}</ul>
	        </div>
	    </div>
	</div>
</div>
@endif
<div id="notify" style="display:none;">
	<div id="login-status" class="error-notice info" style="visibility: visible; opacity: 1;">
	    <div class="content-wrapper">
	        <div id="login-detail">
	            <div id="login-status-icon-container">
	            	<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
            	</div>
	            <ul id="login-status-message" class="list-unstyled">Please Wait : Checking for your credentials.</ul>
	        </div>
	    </div>
	</div>
</div>
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<!-- <form class="login-form" action="index.html" method="post"> -->
		{!!Form::open(['url'=>Url('/admin/login')])!!}
		<h3 class="form-title">تسجيل الدخول لحسابك</h3>


		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">البريد الإلكترونى</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input id="email" dir="rtl" class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="البريد الإلكترونى أو اسم المستخدم" name="email"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">كلمه السر</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input id="password" dir="rtl" class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="كلمه السر" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">تذكرنى 
			<input type="checkbox" name="remember" value="1"/>  </label>
			<button type="submit" id="btn-login" class="btn blue pull-left">
			 <i class="m-icon-swapleft m-icon-white"></i>تسجيل الدخول
			</button>
		</div>
		{!!Form::close()!!}
	
	<!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->

<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 <a href="http://motwreen.com" style="color:black">MoTwreen</a> &copy;  2016 - CRM System V1.0
</div>



<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="{!!Url('/')!!}/back/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{!!Url('/')!!}/back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{!!Url('/')!!}/back/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{!!Url('/')!!}/back/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/global/js/custom.js" type="text/javascript"></script>
<script src="{!!Url('/')!!}/back/assets/global/js/nicescroll.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>

$(document).ready(function(){
    $.backstretch([
	    "{!!Url('/')!!}/back/assets/admin/pages/media/bg/1.jpg",
	    "{!!Url('/')!!}/back/assets/admin/pages/media/bg/2.jpg",
	    "{!!Url('/')!!}/back/assets/admin/pages/media/bg/3.jpg",
	    "{!!Url('/')!!}/back/assets/admin/pages/media/bg/4.jpg",
    ], {
      fade: 1000,
      duration: 8000
    });

    $('#btn-login').on('click',function(event){
   		event.preventDefault();
    	do_login("{{url('/')}}/login");
    });
})

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
