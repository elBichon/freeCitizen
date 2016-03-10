$(function(){
  $("#envoyerInscription").click(function(){
                                 var valid = true;
                                 if($("#login").val() == ""){
                                 $("#login").css("border-color","red");
                                 $("#loginInscription").next(".error-message").fadeIn().text("veuillez entrer votre login").css("color","red");;
                                 valid = false;
                                 }
                                 else if(!$("#login").val().match(/^[a-z]+$/i)){
                                 $("#login").css("border-color","red");
                                 $("#loginInscription").next(".error-message").fadeIn().text("veuillez entrer un login valide").css("color","red");
                                 valid = false;
                                 }
                                 else{
                                 $("#login").css("border-color","green");
                                 }
                                 if($("#ville").val() == ""){
                                 $("#ville").css("border-color","red");
                                 $("#villeInscription").next(".error-message").fadeIn().text("veuillez entrer votre ville ").css("color","red");
                                 valid = false;
                                 }
                                 else if(!$("#ville").val().match(/^[a-z]+$/i)){
                                 $("#ville").css("border-color","red");
                                 $("#villeInscription").next(".error-message").fadeIn().text("veuillez entrer un nom de ville valide").css("color","red");
                                 valid = false;
                                 }
                                 else{
                                 $("#ville").css("border-color","green");
                                 }
                                 if($("#email").val() == ""){
                                 $("#email").css("border-color","red");
                                 $("#emailInscription").next(".error-message").fadeIn().text("veuillez entrer votre adresse ").css("color","red");
                                 valid = false;
                                 }
                                 else if(!$("#email").val().match(/^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/)){
                                 $("#email").css("border-color","red");
                                 $("#emailInscription").next(".error-message").fadeIn().text("veuillez entrer une adresse valide").css("color","red");
                                 valid = false;
                                 }
                                 else{
                                 $("#email").css("border-color","green");
                                 }
                                 if($("#password").val() == ""){
                                 $("#password").css("border-color","red");
                                 $("#passwordInscription").next(".error-message").fadeIn().text("veuillez entrer votre mot de passe ").css("color","red");
                                 valid = false;
                                 }
                                 else{
                                 $("#email").css("border-color","green");
                                 }
                                 if($("#password2").val() == ""){
                                 $("#password2").css("border-color","red");
                                 $("#passwordInscriptionCheck").next(".error-message").fadeIn().text("veuillez entrer votre mot de passe ").css("color","red");
                                 valid = false;
                                 }
                                 else{
                                 $("#password").css("border-color","green");
                                 }
                                 return valid;
                                 });
  
  });

