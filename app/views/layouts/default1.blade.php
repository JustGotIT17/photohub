<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="">
    <meta name="author" content="gipoy17">
    <title>PhotoHub -- Digital Printing Services </title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            {{HTML::script('js/html5shiv.js')}}
            {{HTML::script('js/respond.min.js')}}
        <![endif]-->

	<!-- CSS Implementing Plugins -->
    {{ HTML::style('css/flexslider.css') }}
    {{ HTML::style('css/parallax-slider.css') }}
    {{ HTML::style('css/business-plate.css') }}
    {{ HTML::style('font-awesome-4.2.0/css/font-awesome.min.css') }}
    {{ HTML::style('css/styles.css') }}

     </head>
    <!-- NAVBAR
    ================================================== -->
      <body>

    	<div class="top">
         <div class="container">
                <div class="row-fluid">
                    <ul class="phone-mail">
                        <li><i class="fa fa-phone"></i><span>0933-338-2411 / 0917-7051041 / 02-5024745</span></li>
                        <li><i class="fa fa-envelope"></i><span>gipoy17@gmail.com</span></li>
                    </ul>
                    <ul class="loginbar">
                        @if ( Auth::guest() )
                        <li><small><i class="fa fa-user fa-fw"></i>&nbsp Welcome, Guest!</small></li>
                        <li class="devider">&nbsp;</li>
                        <li> {{ HTML::decode(HTML::link('#', '<i class="fa fa-lock"></i>&nbsp Login', ['data-toggle'=>'modal', 'data-target'=>'.login-area'])) }}</li>
                        @else
                        <li><small><i class="fa fa-user-md fa-fw"></i>&nbsp Welcome, {{Auth::user()->firstName." ".Auth::user()->lastName}}!</small></li>
                        <li class="devider">&nbsp;</li>
                        <li>{{ HTML::decode(HTML::link('/dashboard', '<i class="fa fa-bars fa-fw"></i>&nbsp Dashboard')) }} </li>
                        <li class="devider">&nbsp;</li>
                        <li> {{ HTML::decode(HTML::link('/logout', '<i class="fa fa-sign-out fa-fw"></i>&nbsp Logout')) }}</li>
                        @endif
                    </ul>
                </div>
            </div>
    	</div>

        <!-- topHeaderSection -->
        <div class="topHeaderSection">
            <div class="header">
                <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="/"><img src="img/logo.png" class="img-responsive my-logo" alt="My web solution" /></a>
                </div>
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">

                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="#about">Gallery</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#contact">Contact</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>
    	</div>
        <div id="MainWrapper">
            @yield('content')
        </div>

        <div class="modal fade login-area" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="">
                    <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <br/>
                                <div class="panel panel-default">
                                    <div class="panel-heading clearfix">
                                        <h4 class="pull-left"><i class="fa fa-lock"></i>&nbsp Secured Login</h4>
                                    </div>
                                    <div class="panel-body offset-both">
                                         @if ($errors->has('username') || $errors->has('password'))
                                            <div class="alert alert-danger">
                                                 <i class="fa fa-warning fa-fw"></i>Whoops! something's wrong!<hr style="margin:5px 2px"/>
                                                 {{ $errors->first('username', '<span class="">*:message</span><br/>') }}
                                                 {{ $errors->first('password', '<span class="">*:message</span>') }}

                                            </div>
                                        @endif

                                        {{ Form::open(['url' => 'login', 'class' => 'form-horizontal form-login', 'role' => 'form']) }}
                                            <div class="form-group {{{ $errors->has('username') ? 'error' : '' }}}">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
                                                {{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeHolder' => 'Username']) }}

                                                </div>

                                            </div>
                                            <div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
                                                    {{ Form::password('password', ['class' => 'form-control', 'placeHolder' => 'Password']) }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-btn clearfix">
                                                    {{ HTML::decode(Form::submit('Login', ['class'=>'btn btn-default pull-right'])) }}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>
        </div>

     <!-- footerBottomSection -->
        <div class="footerBottomSection">
            <div class="container">
                &copy; 2014, Allright reserved. <a href="#">Terms and Condition</a> | <a href="#">Privacy Policy</a>

            </div>
        </div>
    {{ HTML::script('js/jquery.min.js')}}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/custom/modernizr.custom.js') }}
    {{ HTML::script('js/custom/jquery.flexslider-min.js') }}
    {{ HTML::script('js/custom/modernizr.js') }}
    {{ HTML::script('js/custom/jquery.cslider.js') }}
    {{ HTML::script('js/custom/back-to-top.js') }}
    {{ HTML::script('js/custom/jquery.sticky.js') }}
    {{ HTML::script('js/custom/app.js') }}
    {{ HTML::script('js/custom/index.js') }}

   <script type="text/javascript">
        jQuery(document).ready(function() {
          	App.init();
            App.initSliders();
            Index.initParallaxSlider();
        });
    </script>
</body>
</html>