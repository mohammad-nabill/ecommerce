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
<a href="stock" class="login_link">My stock</a>
@else
<a href="login" class="login_link" >Login</a>
<a href="register" class="login_link" >Register</a>
@endif

@if(Gate::forUser(auth()->guard('user')->user())->allows('trader', auth()->guard('user')->user() ) )
<a href="add" class="login_link">Add</a>
<a href="myProduct" class="login_link">My Products</a>
<a href="orders" class="login_link">Orders</a>
@endif


	</div>

	<!------------------------ end navbar ------------------------------------------->


<!---------------------- products ----------------------------------------------->

		@foreach($data as $v)
		<div class="productinfo" >
         Model : {{ $v->name }}<br>
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

<!------------------------------------------------------------------------------------>


<div id="successMessage" class="hiddenDiv" >

	<div>

		  <span style="color: #00fff3;">your products submited successfully</span> <br>
          <span >The products will delivered to you within 5 days</span> <br>
          <button style="width: 10% ; margin-top: 10%;" onclick="hide('successMessage')" >ok</button>

	</div>

</div>




	
	<script type="text/javascript">
		
		
 @if(session()->get('addedToCart'))
 var item = document.getElementById('successMessage');
 item.style.display = 'block' ;
 @endif


 function hide($id){
 	var item = document.getElementById($id);
 	item.style.display = 'none' ;
 }


	</script>
		

</body>
</html>