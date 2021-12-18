function validatepassword(){
    var p=document.getElementById("psw").value;
    var cp=document.getElementById("psw-repeat").value;
  
    if(p.trim()===cp.trim()){
      return true;
    }
    else{
      alert("Passwords do not match");
      return false;        }
  }
  function validateblank(){
    var un=document.getElementById("username").value;
    var p=document.getElementById("psw").value;
    if((un.trim().length==0 || un<1 || un>0)&&(un.trim().length<3)){
      alert("Enter a First Name with alphabets only and longer than 3");
      return false;
    }
    if(p.trim().length<8){
      alert("Enter a password that is greater than 8");
      return false;
    }
    return true;
  }
  function validate(){
    if(validateblank()==true && validatepassword()==true){
      return true;
    }
    else{
      return false;
    }
  }
  
  function cvalidateblank(){
    var lun=document.getElementById("lusername").value;
    var lp=document.getElementById("lpsw").value;
    if((lun.trim().length==0 || lun<1 || lun>0)){
      alert("Please enter username");
      return false;
    }
    if(lp.trim().length<1){
      alert("Please enter password");
      return false;
    }
    return true;
  }