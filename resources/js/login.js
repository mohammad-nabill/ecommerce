
var email = document.querySelector('[name="email"]');
		var password = document.querySelector('[name="password"]');

		var email_error = document.getElementById('email') ;
		var password_error = document.getElementById('password') ;

		var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;



//////////////////////////////////////////////////////////////////////////

		email.addEventListener('input',()=> {

             

            if( !email.value.match(validRegex ) ){

           	email_error.style.display = 'inline-block';
           	email_error.innerHTML = "invalid email";

           }else {
           	email_error.style.display = 'none';
           }

		});
		

///////////////////////////////////////////////////////////////////////////
      


        
        document.forms[0].onsubmit = function (e){
           
           if( email.value == '' ){

           	e.preventDefault();
           	email_error.style.display = 'inline-block';
           	email_error.innerHTML="email can\'t be null ";


           }else if(!email.value.match(validRegex)){

             e.preventDefault();
             email_error.style.display = 'inline-block';
           	email_error.innerHTML = "invalid email";

           }

           if( password.value == ''){

             e.preventDefault();

            password_error.style.display = 'inline-block';
           	password_error.innerHTML="password can\'t be null ";


           }



        };
