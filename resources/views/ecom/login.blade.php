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

	{!! Form::open(['class'=>'add_product_form' ]) !!}

    {!! Form::label('email : ') !!}<br>
	{!! Form::text('email') !!} {{ $errors->first('email') }} {{ session()->get('wrong_info') }}<br>

	{!! Form::label('password : ') !!}<br>
	{!! Form::password('password') !!} {{ $errors->first('password') }} <br><br>

	{!! Form::submit('login') !!}<br> 
	Dont have email ?<a href="register"> Register now </a>
	
	{!! Form::close() !!}

	

</body>
</html>