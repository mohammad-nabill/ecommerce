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

<div class="cat">
<button class="btn">categories</button>
		
		<div class="cats">
			<a href="">men</a>
			<a href="">childs</a>
			<a href="">women</a>
		</div>
	</div>

	</div>

	{!! Form::open(['url'=>'product' , 'files'=>true ,'class'=>'add_product_form' ]) !!}

    {!! Form::label('category : ') !!}<br>
	{!! Form::select('category',[null=>'select category','Mobile phone'=>'Mobile phone','Laptop'=>'Laptop','Desktop Computer'=>'Desktop Computer']) !!} 
	{{ $errors->first('category') }} <br>

	{!! Form::label('model : ') !!}<br>
	{!! Form::text('name') !!} {{ $errors->first('name') }} <br>

	{!! Form::label('description : ') !!}<br>
	{!! Form::textarea('description') !!} {{ $errors->first('description') }} <br>
	
	{!! Form::label('picture : ') !!}<br>
	{!! Form::file('pic') !!} {{ $errors->first('pic') }} <br><br>

    {!! Form::label('available quantity : ') !!}<br>
	{!! Form::text('quantity') !!} {{ $errors->first('quantity','it is required and must be numeric') }} <br>


	{!! Form::label('price : ') !!}<br>
	{!! Form::text('price') !!} {{ $errors->first('price') }} <br><br>

	{!! Form::hidden('trader',auth()->guard('user')->user()->id ) !!}
	
	{!! Form::submit('Add') !!}<br> 
	
	{!! Form::close() !!}

	

	@if(session()->get('message')) 

    <div id="addmessage" class="addmessagecontainer">
     <div >
     	<span > {{ session()->get('message') }} </span><br>
     	<button type="button" onclick="hide('addmessage')" >ok</button>
     </div>
     </div>
	@endif
	

	<script src="{{ asset('../resources/js/ecom.js') }}"></script>

	

</body>
</html>