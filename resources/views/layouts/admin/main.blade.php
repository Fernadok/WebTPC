<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/plugins/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/plugins/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('css/plugins/nprogress.css"') }} rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/plugins/custom.min.css') }}" rel="stylesheet">
    <style>
        .loading {
            background: lightgoldenrodyellow url('{{asset('images/processing.gif')}}') no-repeat center 65%;
            height: 80px;
            width: 100px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }
    </style>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @if (!Auth::guest())
            @include('layouts.admin.menu')
        @endif
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <!-- Authentication Links -->
                @if (!Auth::guest())
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('images/img.jpg') }}" alt="">Administrador
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ route('logoutAdmin') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                @endif
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div id="contenedorAdmin" class="panel-body">
                @yield('content')
            </div>
            <div id="content">click any menu above to change content here</div>
            <div class="loading"></div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery/jquery-2.2.0.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/plugins/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('js/plugins/nprogress.js') }}">'</script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/plugins/custom.min.js') }}"></script>
    <script src="{{ asset('js/common/helpers.js') }}"></script>
    <script type="text/javascript">
        function ajaxLoad(filename, content) {
            content = typeof content !== 'undefined' ? content : 'content';
            $('.loading').show();
            $.ajax({
                type: "GET",
                url: filename,
                contentType: false,
                success: function (data) {
                    console.log('----');
                    console.log(data);
                    $("#" + content).html(data.html);
                    $('.loading').hide();
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        }

        $(document).on('click',".pagination li a",function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                type:'GET',
                url:url,
                success:function(data){
                    $("#content").empty().html(data.html);
                }
            });
        });

        @yield('scripts')
    </script>
</body>
</html>