<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
        <title>PhotoHub | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('font-awesome-4.2.0/css/font-awesome.min.css') }}
        {{HTML::style('css/AdminLTE.css')}}
        {{HTML::style('css/styles.css')}}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            {{HTML::script('js/html5shiv.js')}}
            {{HTML::script('js/respond.min.js')}}
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="/" class="logo" style="font-family:'Arial Narrow', Helvetica Neue, Helvetica, Arial ">
                <!-- Add the class icon to your logo image or logo icon to add the margining
               <img src="{{asset('img/logo.png')}}" class="img-responsive" style="height: inherit; width: inherit; " alt="My web solution" /> -->
               PhotoHub
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <i data-toggle="tooltip" data-placement="left" title="Toggle Sidebar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </i>

                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        @if(Auth::user()->role_id == '1')
                        <li class="">
                            <a href="/users/online" data-toggle="tootltip" data-placement="bottom" title="View online users"><b>Online Users</b> </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target=".add-credit"><b data-toggle="tooltip" data-placement="bottom" title="Add System Credit">Add Credits</b> </a>
                        </li>
                        @endif
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span> {{Auth::user()->firstName." ".Auth::user()->lastName}} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue-gradient">
                                    <p>
                                        {{Auth::user()->firstName." ".Auth::user()->lastName}} <br/>
                                    </p>
                                    <small>{{User::getRoleName(Auth::user()->role_id)}}</small>
                                </li>
                                <!-- Menu Body -->
                                @if(Auth::user()->role_id != '3')
                                <li class="user-body">
                                    <div class="col-xs-6 text-center">
                                        <a href="/users"> My Employees</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="/sales">My Sales</a>
                                    </div>

                                </li>
                                @endif
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    @if(Auth::user()->role_id != '3')
                                    <div class="pull-left">
                                        {{ HTML::decode(HTML::link('/branches/edit/'. Auth::user()->branch_id, '<i class="fa fa-home"></i> Store Config', ['class' => 'btn btn-default btn-flat']))}}
                                    </div>
                                    @endif
                                    <div class="pull-right">
                                        {{ HTML::decode(HTML::link('/logout', '<i class="fa fa-sign-out"></i> Sign out', ['class' => 'btn btn-default btn-flat']))}}
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">

                        <div class="pull-left info">
                            <p>Hello, {{Auth::user()->firstName }}</p>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    @if(Auth::user()->role_id == '1')
                        <li class="active">
                            <a href="/dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i> <span>Items</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/items"><i class="fa fa-dedent"></i> <span>Items List</span></a></li>
                                <li><a href="/items/category"><i class="fa fa-chain"></i> <span>Items Category</span></a></li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->role_id != '3')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Sales</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="/sales"><i class="fa fa-angle-double-right"></i> My Sales</a> </li>
                                <li><a href="/sales/add"><i class="fa fa-angle-double-right"></i> Create Sales</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/reports/sales"><i class="fa fa-angle-double-right"></i> Sales</a></li>

                            </ul>
                        </li>
                    @endif
                        @if(Auth::user()->role_id != '3')
                        <li>
                            <a href="/users">
                                <i class="fa fa-users"></i> <span>Employees</span>

                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->role_id != '3')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/users/edit/{{Auth::user()->id}}"><i class="fa fa-angle-double-right"></i> My Account</a></li>
                                <li><a href="/branches/edit/{{Auth::user()->branch_id}}"><i class="fa fa-angle-double-right"></i> My Store</a></li>

                            </ul>
                        </li>
                        @endif
                        @if(Auth::user()->role_id == '1')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-codepen"></i> <span>Maintenance</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/branches"><i class="fa fa-angle-double-right"></i> Branches</a></li>
                                <li><a href="/credits/"><i class="fa fa-angle-double-right"></i> Credit Movements</a></li>

                            </ul>

                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-globe"></i> <span>Web</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/gallery"><i class="fa fa-angle-double-right"></i> Gallery</a></li>
                                <li><a href="/products"><i class="fa fa-angle-double-right"></i> Products</a></li>
                                <li><a href="/events"><i class="fa fa-angle-double-right"></i> Events</a></li>
                                <li><a href="/advertisement"><i class="fa fa-angle-double-right"></i> Advertisement</a></li>

                            </ul>

                        </li>
                        @endif
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header clearfix">
                    <small class="margin-right"><strong>Branch: </strong><span class="text-blue">{{ User::getBranchName(Auth::user()->branch_id)}}</span></small>
                    <i class="margin-right-xs">|</i>
                    <small class="margin-right"><strong>System Credits: </strong><span class="text-blue">{{ number_format(Credit::getCreditAmount(Auth::user()->branch_id), 2, '.', ',')}}</span></small>
                     <small class="pull-right"><i class="fa fa-clock-o fa-fw"></i> {{date('l, F d, Y h:i:s A');}}</small>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row hidden-print">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            @if(Credit::getCreditAmount(Auth::user()->branch_id) <= 500 && Credit::getCreditAmount(Auth::user()->branch_id) > 0)
                                <div class="alert alert-danger"><i class="fa fa-info"></i> You are running out of System Credit. </div>
                            @endif
                        </div>
                    </div>
                    <!-- ADD CREDIT FORM -->
                    <div class="modal fade add-credit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                        <div class="modal-dialog">
                            <div id="addCredit">
                                <div class="row">
                                    <div class="col-md-12">
                                    {{ Form::open(['url' => '/credits/add', 'class' => 'form-horizontal', 'role' => 'form']) }}
                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <h4 class="pull-left">Add System Credit</h4>
                                                <button type="button" class="close pull-right" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Close"><i class="fa fa-close fa-fw"></i> </button>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                                                        <div id="osm" class="form-group">
                                                            {{ Form::label('branch', '* Branch:'); }}
                                                            {{ $errors->first('branch', '<br/><span class=errormsg>*:message</span>') }}
                                                            {{ Form::select('branch_id',  DashboardController::getBranches(), null, ['class' => 'form-control offices']) }}
                                                        </div>
                                                        <div class = "form-group">
                                                            {{ Form::label('amount', '* Amount to Add:'); }}
                                                            {{ $errors->first('amount', '<br/><span class=errormsg>*:message</span>') }}
                                                            {{ Form::text('amount', null, ['class' => 'form-control', 'placeholder'=> 'Eg.: 10000']) }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="panel-footer clearfix">
                                                {{Form::submit('Submit', ['class'=>'btn btn-primary margin-right-lg pull-right', 'onclick'=>'return confirm("Are you sure?");'])}}
                                            </div>
                                        </div>
                                    {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end -->
                    <div id="">
                        @yield('content')
                    </div>
                   <!-- Main row -->
                    @if ($message = Session::get('success'))
                        <div class="alert notif">
                           <span class="close text-danger" data-dismiss="alert">&times;</span>
                          <span class="message">{{{ $message }}}</span>
                      </div>
                    @endif
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

    {{ HTML::script('js/jquery.min.js')}}
    {{HTML::script('js/jquery-ui.min.js')}}
    {{HTML::script('js/AdminLTE/app.js')}}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{HTML::script('js/scripts.js')}}
    </body>
</html>