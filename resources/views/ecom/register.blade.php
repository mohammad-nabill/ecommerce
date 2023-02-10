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

	{!! Form::open(['class'=>'register_form' ]) !!}

	{!! Form::label('first name : ') !!}<br>
	{!! Form::text('firstName') !!} {{ $errors->first('firstName') }} <br>

    {!! Form::label('last name : ') !!}<br>
	{!! Form::text('lastName') !!} {{ $errors->first('lastName') }} <br>

    {!! Form::label('email : ') !!}<br>
	{!! Form::text('email') !!} {{ $errors->first('email') }}<br>
    

	{!! Form::label('password : ') !!}<br>
	{!! Form::password('password') !!} {{ $errors->first('password') }} <br>

    {!! Form::label('confirm password : ') !!}<br>
	{!! Form::password('password_confirmation') !!} <br>

    <div class="trade_name" id="trade_name">
	{!! Form::label('Trade Name : ') !!}<br>
	{!! Form::text('tradeName',"",['id'=>'trade_value']) !!} {{ $errors->first('tradeName') }} <br>
    </div>

	{!! Form::submit('register') !!}  <input type="checkbox" id="check" name="trader" value="yes" onchange="showinput()"> i am trader<br>
	{{ session()->get('message') }}
	
	

	{!! Form::close() !!}

	


	<script src="{{ asset('../resources/js/ecom.js') }}"></script>


</body>
</html>