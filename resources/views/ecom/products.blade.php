<!DOCTYPE html>
<html>
<head>
	<title>cart</title>

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
	
	



function count($price,$id){

var qty = document.getElementById('select'+$id);

document.getElementById('total'+$id).innerHTML = qty.value * $price ;
document.getElementById('price'+$id).value = qty.value * $price ;
document.getElementById('qty'+$id).value = qty.value ;

let text = 0;


  @if(session()->get('id'))
  @foreach( session()->get('id') as $v )

  text += parseInt(document.getElementById('price'+{!! $v !!} ).value) ;

  @endforeach
  @endif

  document.getElementById("general_toal").value = text;

}


</script>


</body>
</html>