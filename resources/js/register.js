
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

/////////////////////////////////////////////////////////////////

  function show($id){
    document.getElementById($id).style.display='block';
  }

  /////////////////////////////////////////////////////////////////


  function hide($id){
    document.getElementById($id).style.display='none';
  }
    /////////////////////////////////////////////////////////////////



    var firstName = document.querySelector("[name='firstName']");
    var lastName = document.querySelector("[name='lastName']");
    var email = document.querySelector("[name='email']");
    var password = document.querySelector("[name='password']");
    var password_confirm = document.querySelector("[name='password_confirmation']");

    var firstName_e = document.getElementById('firstName_e');
    var lastName_e = document.getElementById('lastName_e');
    var email_e = document.getElementById('email_e');
    var password_e = document.getElementById('password_e');


    var pattern1 = /^[A-Za-z]+$/;
    var pattern2 = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var pattern3 = /^(?=.*[a-z])(?=.*?[0-9]).{8,}/;

        firstName.addEventListener('input', first );
        lastName.addEventListener('input', last );
        email.addEventListener('input', check_email ); 
        password.addEventListener('input', check_password ); 



    /////////////////////////////////////////////////////////////////

          function first(){

          if ( !firstName.value.match(pattern1) ){
            firstName_e.innerHTML = "invalid name";
            return false;   
          }else{
                firstName_e.innerHTML = ""; 
          }

        }

        /////////////////////////////////////////////////////////

                  function last(){


          if ( !lastName.value.match(pattern1) ){
            lastName_e.innerHTML = "invalid name";
            return false;   
          }else{
                lastName_e.innerHTML = "";  
          }

          

        }
       //////////////////////////////////////////////////////////         

              function check_email(){

          if ( !email.value.match( pattern2 ) ){
            email_e.innerHTML = "invalid email";   
            return false;
          }else{
                email_e.innerHTML = "";                  
          }

          email_exist();

        }
       /////////////////////////////////////////////////////////
       function check_password(){

          if ( !password.value.match( pattern3 ) ){
            password_e.innerHTML = " min 8,numbers and characters";   
            return false;
          }else{
                password_e.innerHTML = "";
                  
          }

        }
//////////////////////////////////////////////////////////////////////

       function check_confirmation(){

          if ( password_confirm.value != password.value ){
            password_e.innerHTML = "passord don\'t match ";   
            return false;
          }else{
                password_e.innerHTML = "";
                  
          }

        }

       ///////////////////////////////////////////////////////////

               document.forms[0].onsubmit = function (e){

                first();
                last();
                check_email();
                check_password();
                check_confirmation();
                

                if( check_email() == false || first() == false || last() == false || check_password() == false || check_confirmation() == false ){
                  e.preventDefault();
                }

            }

       ////////////////////////////////////////////////////////////////////////

       function email_exist(){

    if(email.value.length == 0){
      document.getElementById("demo").innerHTML = "" ;
        return;
    }


  const xhttp = new XMLHttpRequest();

  xhttp.onload = function() {
    
    document.getElementById("email_e").innerHTML = this.responseText ;

    
  }

  xhttp.open("GET", `ajax?name=${email.value}`);
  xhttp.send();

  }

  //////////////////////////////////////////////////////



  





