<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>@yield('title','Register')</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('assetsregister/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assetsregister/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">

    <!-- Fontawesome CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('assetsregister/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assetsregister/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('assetsregister/css/main.css') }}" rel="stylesheet" media="all">

    <!-- Alert CSS-->
    <link href="{{ asset('assetsregister/css/alert.css') }}" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration Form</h2>
                </div>
                <div class="card-body">
                    @if(count($errors) > 0)
                        <div class="alertwarning">
                            <ul>
                                {{-- <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> --}}
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div></br>
                    @endif

                    @if($message = Session::get('success'))
                        <div class="alertsuccess">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong><i class="fas fa-check"></i></strong> {{ $message }}
                        </div></br>
                    @endif
                    <form method="POST" action="{{ route('registerstore') }}">
                        @csrf
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="name" value="{{ old('name') }}" required>

                                    {{-- @error('name')
                                        <span class="alertwarning" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Level</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="level" id="level">
                                            <option value="" disabled="disabled" selected="selected">-- Pilih Level --</option>
                                            <option value="admin">Admin</option>
                                            <option value="dokter">Dokter</option>
                                            <option value="apotek">Apotek</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                            <a href="{{ route('masuk') }}" class="btn btn--radius-2 btn--blue">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert JS-->
    <script>
        $(".close").click(function() {
            $(this)
                .parent(".alert")
                .fadeOut();
            });
    </script>

    <!-- Jquery JS-->
    <script src="{{ asset('assetsregister/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('assetsregister/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assetsregister/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assetsregister/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('assetsregister/js/global.js') }}"></script>

</body>

</html>
<!-- end document-->