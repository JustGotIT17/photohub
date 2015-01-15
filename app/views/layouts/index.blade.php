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
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('font-awesome-4.2.0/css/font-awesome.min.css') }}
        {{ HTML::style('css/default.css') }}

    </head>
    <body>
        <header id="top">
            <img src="images/logo.jpg" class="img-responsive my-logo" alt="My web solution" />
            <h1 id="title">Digital Print Services</h1>
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
            <div id="f_events" class="">
                <span style="background-color: rgba(255, 255, 255, 0.66); display: block;">
                    <span class="" style="width: 80%; display: block; margin: 0 auto;">
                        @if(count($events))
                        <div>
                            <marquee>
                                @foreach($events as $item)
                                   {{($item == reset($events)) ? '<b>Upcoming Events: </b>' : ''}} {{$item }} {{($item == end($events)) ? '' : '|'}}
                                @endforeach
                            </marquee>
                        </div>

                        @else
                            <div>
                                No events
                            </div>
                        @endif
                    </span>
                </span>

            </div>
        </header>

                <div class="modal fade login-area" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog">
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

        <div id="wrapper" class="">
            <nav id="top">
                <ul id="top_menu">
                    <li><a href="/" class="active">Home</a></li>
                    <li><a href="/web/gallery">Gallery</a></li>
                    <li><a href="/web/events">Events</a></li>
                    <li><a href="/web/services">Services</a></li>
                    <li><a href="/web/branches">Branches</a></li>
                    <li><a href="/web/products">Products</a></li>
                    <li>{{(Auth::guest() ? '<a href="/login">Login</a>' : '<a href="/logout">Logout</a>')}}</li>
                    <li><a href="/web/contact">Contact</a></li>
                </ul>
            </nav>
            <div id="MainContainer">
                <div id="MainContent">
                     @yield('content')
                </div>




            </div>
            <div class="footerBottomSection">
                <div class="container clearfix">
                    <div class="pull-left">
                        &copy; 2014, All rights reserved.
                    </div>

                </div>
            </div>
        </div>
    {{ HTML::script('js/jquery.min.js')}}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/default.js') }}
    </body>
</html>