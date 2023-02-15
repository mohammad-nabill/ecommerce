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


@foreach( $data as $v )
<div class="cartProduct" >

<div style="width: 20%;text-align: center;">
<img class="cartPic"  src="products/{{ $v->product_info->pic }}">
</div>

<div style="position:absolute;right: 5px;top:0">
price : {{ $v->price }} L.E<br>
</div>

<div style="">
name : {{ $v->product_info->name }} <br>
</div>


<div style="position:absolute;right: 5px;bottom:0">
quantity : <span id="" >{{ $v->quantity }}</span> 
</div>


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