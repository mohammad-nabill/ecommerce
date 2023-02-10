
function showinput(){
  	var v = document.getElementById("check").checked;
  	var x = document.getElementById("trade_name");
  	var t = document.getElementById("trade_value");

  	if (v == true) {
    x.style.display = "block";
  } else {
    x.style.display = "none";
    t.value = "";
  }

  }

  function show($id){
    document.getElementById($id).style.display='block';
  }

  function hide($id){
    document.getElementById($id).style.display='none';
  }



