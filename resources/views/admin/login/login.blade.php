<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>

        <!-- Core CSS - Include with every page -->
        <link href="{{asset('/')}}/admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/{{asset('/')}}/admin/css/font-awesome.css" rel="stylesheet">

        <!-- SB Admin CSS - Include with every page -->
        <link href="{{asset('/')}}/admin/css/sb-admin.css" rel="stylesheet">

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-success btn-block"  name="btn" type="submit" value="Login">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Scripts - Include with every page -->
        <script src="{{asset('/')}}/admin/js/jquery-1.10.2.js"></script>
        <script src="{{asset('/')}}/admin/js/bootstrap.min.js"></script>
        <script src="{{asset('/')}}/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>

        <!-- SB Admin Scripts - Include with every page -->
        <script src="{{asset('/')}}/admin/js/sb-admin.js"></script>

    </body>

</html>
