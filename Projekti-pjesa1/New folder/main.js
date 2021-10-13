function validate(number){
    var  inputList = document.getElementsByClassName("input");
    if( number == 0  ){

      if(inputList[0].value =="" || inputList[1].value==""){
        alert("please fill data");
      }else{
        alert("login succesful");
      }
    }
       else if (number == 1){
        
      }
    }
  
  function changeForm(param){
    var divList = document.getElementsByClassName('forms');
    if(param==0){
      divList[0].classList.add('form-style');
      divList[0].classList.remove('hidden');
      divList[1].classList.remove('form-style');
      divList[1].classList.add('hidden');

    }
    else if(param==1){
      divList[1].classList.add('form-style');
      divList[1].classList.remove('hidden');
      divList[0].classList.remove('form-style');
      divList[0].classList.add('hidden');

    }
  }
  for(var i=0; i<elementList.length; i++){
    elementList[i].addEventListener('keyup',function(event){
      event.preventDefault();
    loginObj={
      ...loginObj,
      [event.target.name]: event.target.value
    }
      if (event.target.name== 'username'){
        usernameVal = event.target.value;

      }
      else if (event.target.name == 'password'){
        passwordVal =event.target.value;
      }
      console.log('username is'+ usernameVal + 'and pass is +passwordVAl');
      loginObj ={
        username: usernameVal,
        password: passwordVal
      }
    })
    
  }
  var usernameVal="";
  var passwordVal="";
 var loginObj = {
   username: "",
   password:""
 }