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
@else
<a href="login" class="login_link" >Login</a>
<a href="register" class="login_link" >Register</a>
@endif

@if(Gate::forUser(auth()->guard('user')->user())->allows('trader', auth()->guard('user')->user() ) )
<a href="add" class="login_link">Add</a>
@endif



	</div>

	<!------------------------ end navbar ------------------------------------------->

@if(session()->get('id'))

@foreach( session()->get('id') as $id )
<div class="cartProduct" >

<div style="width: 20%;text-align: center;">
<img class="cartPic"  src="products/{{ session()->get('pic'.$id) }}">
</div>

<div style="position:absolute;right: 5px;top:0">
{{ session()->get('price'.$id) }} L.E<br>
</div>

<div style="position:absolute;right: 5px;bottom:0">
total : <span id="total{{$id}}" >{{ session()->get('price'.$id) }}</span> L.E
</div>


<div style="position:absolute;top:0;left: 22%;width: 60%;clear: left;">

<p style="color: blue;height:50px;overflow: auto;">{{ session()->get('description'.$id) }}</p>


<i style="color: #B12704;"> only {{ session()->get('quantity'.$id) }} left in stock </i><br>

<label>qty :</label>
<select name="qty" id="select{{$id}}" onchange="count('{{session()->get('price'.$id)}}','{{$id}}')" >
	@for($c=1 ; $c <= session()->get('quantity'.$id) ;$c++)
	<option value="{{ $c }}">{{$c}}</option>
	@endfor
</select><br>

<label>name :</label>{{ session()->get('name'.$id) }}<br>
<label>id :</label>{{ session()->get('id'.$id) }}<br>
</div>

</div>
@endforeach

@endif

<!-------------------------------side bar ----------------------------------------------->
@if(session()->get('id'))

<div class="side_bar" >
@php $general_total = 0; @endphp

<form action="cartinfo" >
@foreach(session()->get('id') as $id )
 <input id="price{{$id}}" name="price{{$id}}"  readonly class="total_price" value="{{ session()->get('price'.$id) }}"><br>
 <input id="id{{$id}}" name="id{{$id}}"  readonly class="total_price" value="{{ session()->get('id'.$id) }}"><br>
 <input id="qty{{$id}}" name="qty{{$id}}"  readonly class="total_price" value="1"><br>
 @php $general_total += session()->get('price'.$id); @endphp
@endforeach
<button>submit</button>
</form>

 general total : <input id="general_toal" class="total_price" readonly value="@php echo $general_total; @endphp">
</div>

@endif

<!-------------------------------end side bar ----------------------------------------------->

<button onclick="test()"> aksjgda</button>

<p id="demo"></p>

<script type="text/javascript">
	
	

function test(){
	alert(c);
}

	function count($price,$id){

		var qty = document.getElementById('select'+$id);

document.getElementById('total'+$id).innerHTML = qty.value * $price ;
document.getElementById('price'+$id).value = qty.value * $price ;
document.getElementById('qty'+$id).value = qty.value ;

}



var s=0;

const c =[] ;
  @if(session()->get('id'))
  @foreach( session()->get('id') as $v )
  c.push (   {!! $v !!}  )  ;
  @endforeach
  @endif
document.getElementById('general_toal').value = "asdgajhsgd";

  let text = 0;

c.forEach(myFunction);

document.getElementById("demo").innerHTML = text;
 
function myFunction(item, index) {
  text += parseInt(document.getElementById('total'+item).value) ; 
}





//alert($id);
//alert(total);
	

//document.getElementById('select').addEventListener('change', function() {
//alert(this.value);
//});

</script>

</body>
</html>