<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    .content{
        max-width: 500px;
        margin: auto;
    }

    .container{
        margin-top: 50px;
    }

    h1{
        text-align: center;
        font-family: emoji;
    }

    .btn{
        font-size: larger;
    }

    .text-left{
        padding: 15px 40px 15px 40px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    h4{
        float: right;
        margin: 40px 0px;
    }
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
<body>
<div class="container">
    <div class="row justify-content-center content" style="border: 1px solid gray;"> 
        <!-- <div class="col-md-8"> -->
            <div class="card">
                <!-- <div class="card-header">{{ __('Register') }}</div> -->
                <h1>Registration Form</h1>

                <div class="card-body">
                    <form method="POST" aria-label="{{ __('Register') }}" id="form">
                        @csrf

                        <div class="text-left">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                        <div class="text-left">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                        <div class="text-left">
                            <label for="contact_number" class="col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="contact_number" type="number" class="form-control{{ $errors->has('contact_number') ? ' is-invalid' : '' }}" name="contact_number" value="{{ old('contact_number') }}" required>

                                @if ($errors->has('contact_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_number') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                        <div class="text-left">
                            <label for="address" class="col-form-label text-md-right">{{ __('Address') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="address" type="text-left" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                        <div class="text-left">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                        <div class="text-left">
                            <label for="confirm_password" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="confirm_password" type="password" class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" name="confirm_password" required>

                                @if ($errors->has('confirm_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                        <div class="form-group row mb-0" style="text-align: center;">
                            <!-- <div class="col-md-6 offset-md-4"> -->
                                <button type="button" class="btn btn-primary" onclick="submitForm();">
                                    {{ __('Register') }}
                                </button>
                            <!-- </div> -->
                        </div>
                    </form>
                </div>
            </div>
        <!-- </div> -->
    </div>
</div>
<script type="text/javascript">
    function submitForm(argument) {
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        var address = $('#address').val();
        var contact_number = $('#contact_number').val();

        if (password != confirm_password) {

            alert('Your password does not matched. Please enter correct password');

        }else{

            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){

                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type : "POST",
                    url : "{{config('app.baseURL')}}/register",
                    data : {'name':name, 'email':email, 'password':password, 'contact_number':contact_number, 'address':address},
                    
                    success : function(data){

                        alert('Your registration has been done successfully');
                        window.location.href = "{{config('app.baseURL')}}/login "
                    }
                });

            }else{

                alert('Please enter correct email id');
            }
            
        }        
    }
</script>
</body>
</html>
