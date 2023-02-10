<!DOCTYPE html>
<html>
<head>
	<title>ecom</title>

	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
	



	<link rel="stylesheet" type="text/css" href="{{ asset('../resources/css/ecom.css') }}">

	<style type="text/css">

	</style>

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
         {{ $v->name }}<br>
         <img class="product_img" src="products/{{ $v->pic }}" ><br>
         <p class="product_des">{{ $v->description }}</p>
         <span class="product_price">{{ $v->price }} L.E </span>

         {!! Form::open(['url'=>'cart']) !!}
         {!! Form::hidden('id', $v->id ) !!}
         {!! Form::hidden('name', $v->name ) !!}
         {!! Form::hidden('description', $v->description ) !!}
         {!! Form::hidden('price',$v->price) !!}
         {!! Form::hidden('trader',$v->traderName->id) !!}
         {!! Form::hidden('quantity',$v->quantity) !!}
         {!! Form::hidden('pic',$v->pic) !!}

         <span class="addTocart_btn">{!! Form::submit('Add to cart') !!}</span>

         {!! Form::close() !!}

         <span class="trader_info">by : {{ $v->traderName->tradeName }}</span><br>
         <span class="quantity">available : {{ $v->quantity }}</span><br>

         </div>
		@endforeach









	
	<script type="text/javascript">
		
		function test(){
			//window.scrollTo(0, document.body.scrollHeight);
			//window.scrollTo(0,200);
			//document.getElementById("test").scrollIntoView();


		}
	</script>
		

</body>
</html>