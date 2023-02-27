<!DOCTYPE html>
<html>
<head>
	<title>ecom</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="stylesheet" type="text/css" href="{{ asset('../resources/css/ecom.css') }}">

	<style type="text/css">

	</style>

</head>
<body>



	<div class="navbar">
<a href="home" class="link">Home</a>

	</div>

	{!! Form::open(['class'=>'add_product_form']) !!}

    {!! Form::label('email : ') !!}<br>
	{!! Form::text('email') !!} {{ $errors->first('email') }} {{ session()->get('wrong_info') }}
	 <span id='email' style="display : none;color:white"> </span><br>

	{!! Form::label('password : ') !!}<br>
	{!! Form::password('password') !!} {{ $errors->first('password') }} 
	<span id='password' style="display : none;color:white"> </span> <br><br>

	{!! Form::submit('login') !!}<br> 
	Dont have email ?<a href="register"> Register now </a>
	
	{!! Form::close() !!}


    


	<script src="{{ asset('../resources/js/login.js') }}"></script>



	

</body>
</html>