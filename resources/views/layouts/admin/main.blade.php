<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WebTPC 2.0 Admin</title>

    <!-- Styles -->
    <!-- Bootstrap -->
    <link href="{{ asset('css/plugins/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/plugins/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('css/plugins/nprogress.css"') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
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
    <!-- Scripts
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>-->
</head>
<body>
<div id="app">
    @include('layouts.admin.menu')
    <div class="loading"></div>
    <div id="content"></div>
    @yield('content')
</div>

<!-- Scripts -->

<!-- jQuery -->
<script src="{{ asset('js/jquery/jquery-2.2.0.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('js/plugins/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('js/plugins/nprogress.js') }}"></script>
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

@yield('modal-dialog')
</body>
</html>
