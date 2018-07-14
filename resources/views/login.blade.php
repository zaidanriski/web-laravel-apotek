<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apotek Obat - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-wrapper">
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 class="panel-title"><strong>Login.</strong></h1>
                            </div>
                            <div class="panel-body">
                                 @if(\Session::has('alert'))
                                    <div class="alert alert-warning alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <i class="icon fa fa-warning"></i> {{Session::get('alert')}}
                                    </div>
                                @endif
                                <form role="form" method="POST" action="{{ url('/LoginPost') }}">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="Username">Username :</label>
                                            <input class="form-control" id="Username" name="username" type="text" placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                            <label for="Password">Password :</label>
                                            <input class="form-control" id="Password" name="password" type="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login </button>
                                </form>
                            </div>
                        </div>
        </div>
        <div class="col-lg-4">
        </div>
</div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>