<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PhotoHub | Error:Login duplication</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('font-awesome-4.2.0/css/font-awesome.min.css') }}
        {{HTML::style('css/styles.css')}}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            {{HTML::script('js/html5shiv.js')}}
            {{HTML::script('js/respond.min.js')}}
        <![endif]-->
    </head>
    <body>
        <br/><br/>
        <div class="row-fluid">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jumbotron">
                    <h2 class="text-center"><i class="fa fa-ban fa-2x fa-fw"></i><br/>Login Account Duplication</h2><hr/>
                    <p class="text-center">The username <font color="#b22222">{{$username}} </font>  is currently working at this moment...</p>
                    <p class="text-center">Please contact the administrator and ask assistance to your account.</p>
                    <h3 class="text-center">Thanks for bearing with us!</h3>
                </div>
            </div>
        </div>
    </body>
</html>

