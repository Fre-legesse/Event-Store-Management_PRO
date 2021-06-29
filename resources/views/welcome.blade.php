
<!DOCTYPE html>
<html>
<head>
    <title>Stock Management System</title>
    <meta charset="utf-8">
    <meta  name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.png">
    <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <style type="text/css">
        html {

  background-color:#F5F5F5 ;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
        *{
            box-sizing: border-box;
        }
        label{
            color: black;
        }

        body{
            margin: 0;
            font-family: 'Sugoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1rem;
            line-height: 1.5;
            color: #333;
            overflow-x:hidden;
        }
        .v-header{
            height: 100vh;
            display: flex;
            align-items: center;
            color: #fff;

        }
        .container{
            max-width: 820px;
            padding-left: 1.3rem;
            padding-right: 1rem;

            margin:  auto;
            text-align: center;
        }

        .fullscreen-video-wrap{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 120vh;
            overflow: hidden;
            float: right;
        }
        .fullscreen-video-wrap img{
            min-width: 100%;
            min-height: 100%;
            float: right;
            }

        .header-overlay{
            height: 70vh;
            width: 60vh;
            position: absolute;
            top: 0;
            left: 0;
            background-color: white;


            z-index: 1;
            opacity: 0.85;
        }

        .header-content{
        z-index:2;
         min-height: 120vh;
          min-width: 120vh;
              position: fixed;
            top: 190px;
            left: 40%;
            font-size: 20px;
            margin-bottom: 20px;
            float: right;

          }

          .header-content h1{
            font-size: 50px;
            margin-bottom: 0;


          }
          .header-content2{

        z-index:2;
          }
          .header-content2.card{


            height: 120vh;
            width: 120vh;
            position: absolute;
            top: 130px;
            left: 0;
            font-size: 20px;
            margin-bottom: 40px;
            float: left;
            color: black;
            align-items: left;
margin-left: 40px;

          }


    </style>
</head>
<body style="background: url(../assets/images/test8.jpg) no-repeat center center fixed; ">

  <header class="v-header container">


    <div class="header-content2 col-md-10" >

           <!-- background: linear-gradient(to right, #FFCE00 0%, #cfecf8 67%); stroke: black; -->

<div class="card" style="background-color: #F5F5F5;">
    <h1 style="color: red;">BGI ETHIOPIA</h1>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('Username') }}</label>

                            <div class="col-md-12" >
                                <input id="email"  type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="E.g: john.doe" autofocus style="background-color: #FFF!important;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mr-auto">
                            <div class="col-md-8 col-lg-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg" style="background-color: #8d734a;width: 180px;" >
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>

       </div>
    </div>
    </div>


  </header>
</body>
</html>
