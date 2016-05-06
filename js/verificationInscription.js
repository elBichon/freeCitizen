//verification front de l inscription

$(function(){
  $("#envoyerInscription").click(function(){
                                  
                                  //Verification que le champ de login est vide
                                  //coloration en rouge
                                  //affichage d un message d erreur
                                 var valid = true;
                                 if($("#login").val() == ""){
                                 $("#login").css("border-color","red");
                                 $("#loginInscription").next(".error-message").fadeIn().text("veuillez entrer votre login").css("color","red");;
                                 valid = false;
                                 }
                                 
                                 //verification que le format est correct
                                 //coloration en rouge
                                 //affichage d un message d erreur
                                 else if(!$("#login").val().match(/^[a-z]+$/i)){
                                 $("#login").css("border-color","red");
                                 $("#loginInscription").next(".error-message").fadeIn().text("veuillez entrer un login valide").css("color","red");
                                 valid = false;
                                 }
                                 
                                 ////sinon coloration des champs en vert 
                                 else{
                                 $("#login").css("border-color","green");
                                 }
                                 
                                 //recuperation de la ville
                                 //coloration en rouge
                                 //affichage d un message d erreur
                                 if($("#ville").val() == ""){
                                 $("#ville").css("border-color","red");
                                 $("#villeInscription").next(".error-message").fadeIn().text("veuillez entrer votre ville ").css("color","red");
                                 valid = false;
                                 }
                                 
                                 //recuperation du format 
                                 //coloration en rouge
                                 //affichage d un message d erreur
                                 else if(!$("#ville").val().match(/^[a-z]+$/i)){
                                 $("#ville").css("border-color","red");
                                 $("#villeInscription").next(".error-message").fadeIn().text("veuillez entrer un nom de ville valide").css("color","red");
                                 valid = false;
                                 }
                                 
                                 //sinon coloration en vert
                                 else{
                                 $("#ville").css("border-color","green");
                                 }
                                 
                                  //recuperation de l adresse mail
                                  //verification du format
                                 //coloration en rouge
                                 //affichage d un message d erreur
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
                                 
                                 //sinon coloration en vert
                                 else{
                                 $("#email").css("border-color","green");
                                 }
                                 
                                 //recuperation du mot de passe
                                 //si le message est vide
                                 //coloration en rouge
                                 //affichage d un message d erreur
                                 if($("#password").val() == ""){
                                 $("#password").css("border-color","red");
                                 $("#passwordInscription").next(".error-message").fadeIn().text("veuillez entrer votre mot de passe ").css("color","red");
                                 valid = false;
                                 }
                                 
                                 //sinon coloration en vert
                                 else{
                                 $("#email").css("border-color","green");
                                 }
                                 
                                 //recuperation du champ verification du mdp
                                 //coloration en rouge
                                 //message d erreur
                                 if($("#password2").val() == ""){
                                 $("#password2").css("border-color","red");
                                 $("#passwordInscriptionCheck").next(".error-message").fadeIn().text("veuillez entrer votre mot de passe ").css("color","red");
                                 valid = false;
                                 }
                                 
                                 //sinon coloration en vert
                                 //passage a la page suivante
                                 else{
                                 $("#password").css("border-color","green");
                                 }
                                 return valid;
                                 });
  
  });

