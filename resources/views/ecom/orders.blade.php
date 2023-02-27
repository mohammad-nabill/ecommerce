<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>

		<link rel="stylesheet" type="text/css" href="{{ asset('../resources/css/ecom.css') }}">

</head>
<body>

	<!--------------------------------- navbar ----------------------------------->
	<div class="navbar">
<a href="home" class="link">Home</a>


<div class="cat">
<button class="btn">Categories</button>
		
		<div class="cats">
			<a href="category?cat=Laptop">laptop</a>
			<a href="category?cat=Mobile phone">Mobile</a>
			<a href="category?cat=Desktop computer">Desktop computer</a>
		</div>
	</div>

	<a href="cart" class="link">My Cart</a>
	
@if( auth()->guard('user')->user() )
<a href="logout" class="login_link">Logout</a>
<a href="" class="login_link">{{ auth()->guard('user')->user()->firstName }}</a>
@else
<a href="login" class="login_link" >Login</a>
<a href="register" class="login_link" >Register</a>
@endif

@if(Gate::forUser(auth()->guard('user')->user())->allows('trader', auth()->guard('user')->user() ) )
<a href="add" class="login_link">Add</a>
@endif



	</div>

	<!------------------------ end navbar ------------------------------------------->


		@foreach($data as $v)
		<div class="productinfo" >
         
         <img class="product_img" src="products/{{ $v->product_info->pic }}" ><br>
          Model : {{ $v->product_info->name }}<br>
         order date : {{ $v->created_at->format('d/m/Y h:m A') }}
         <span class="product_price">{{ $v->price }} L.E </span>

         {!! Form::open(['url'=>'delivered']) !!}
         {!! Form::hidden('id', $v->id ) !!}
         
         <span class="addTocart_btn">{!! Form::submit('Delivered') !!}</span>

         {!! Form::close() !!}

         <span id="available" >availavle : {{ $v->quantity + $v->product_info->quantity }}</span><br>

         <span id="ordered_quantity">ordered quantity : {{ $v->quantity }}</span><br>
         <span class="qty_after_order">qty after order : {{ $v->product_info->quantity }}</span><br>

         </div>
		@endforeach






</body>
</html>