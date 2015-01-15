<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="">
    <meta name="gipoy17" content="photohub">
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
    {{ HTML::style('css/business-plate.css') }}
    {{ HTML::style('font-awesome-4.2.0/css/font-awesome.min.css') }}
    {{ HTML::style('css/styles.css') }}

     </head>
    <!-- NAVBAR
    ================================================== -->
      <body class="">

    	<div class="top">
         <div class="container">
                <div class="row-fluid">
                    <a class="navbar-brand" href="/">
                        <img src="images/logo.jpg" class="img-responsive my-logo" alt="My web solution" />
                        <span class="hidden-xs hidden-sm">Digital Printing Services</span>
                    </a>

                    <ul class="loginbar">
                        @if ( Auth::guest() )
                        <li><small style="color:#f5f5f5"><i class="fa fa-user fa-fw"></i>&nbsp Welcome, Guest!</small></li>
                        <li class="devider">&nbsp;</li>
                        <li> {{ HTML::decode(HTML::link('#', '<i class="fa fa-lock"></i>&nbsp Login', ['data-toggle'=>'modal', 'data-target'=>'.login-area'])) }}</li>
                        @else
                        <li><small style="color:#f5f5f5"><i class="fa fa-user-md fa-fw"></i>&nbsp Welcome, {{Auth::user()->firstName." ".Auth::user()->lastName}}!</small></li>
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
        <div class="topHeaderSection shadow">
            <div class="header">
                <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>

                </div>
                <div class="navbar-collapse collapse">
                  <ul id="top_menu" class="nav navbar-nav navbar-right">
                    <li><a href="/" class="active">Home</a></li>
                    <li><a href="/web/gallery">Gallery</a></li>
                    <li><a href="/web/events">Events</a></li>
                    <li><a href="/web/services">Services</a></li>
                    <li><a href="/web/branches">Branches</a></li>
                    <li><a href="/web/products">Products</a></li>
                    <li><a href="/web/contact">Contact</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>
    	</div>

        <div id="MainWrapper">
            <div class="container">
                <div class="row hidden-xs hidden-sm" id="featured">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div id="f_design" class="featured">
                            @if(count($ad))
                                @foreach($ad as $item)
                                <div>
                                    <img class="img-responsive" src="{{$item}}">
                                </div>
                                @endforeach
                            @else
                                <div>
                                    No advertisement
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="visible-xs-inline-block visible-sm-inline-block">
                    &nbsp;
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div id="f_product" class="featured">
                            @if(count($featured))
                                @foreach($featured as $item)
                                <div>
                                    <img class="img-responsive" src="{{$item}}">
                                </div>
                                @endforeach
                            @else
                                <div>
                                    No Featured Product
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div id="MainContent">
                @yield('content')
            </div>

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
    {{ HTML::script('js/default.js') }}

</body>
</html>