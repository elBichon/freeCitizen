//verification front de l adresse mail fournir


$(function(){
  $("#envoyerEmailCodeOublie").click(function(){
                               var valid = true;
                               //verification que le champ est rempli
                               //si vide coloration en rouge
                               //si vide affichage d un message d erreur
                               if($("#champEmailCodeOublie").val() == ""){
                               $("#champEmailCodeOublie").css("border-color","red");
                               $("#emailCodeOublie").next(".error-message").fadeIn().text("veuillez entrer votre adresse email").css("color","red");;
                               valid = false;
                               }
                               
                               //verification que le format est correct
                               //si vide coloration en rouge
                               //si vide affichage d un message d erreur
                                     else if(!$("#champEmailCodeOublie").val().match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/)){
                               $("#champEmailCodeOublie").css("border-color","red");
                               $("#emailCodeOublie").next(".error-message").fadeIn().text("veuillez entrer une adresse emailvalide").css("color","red");
                               valid = false;
                               }
                               
                               //si les champs sont corrects
                               //coloration en vert
                               //autoriser l insertion
                               else{
                               $("#champEmailCodeOublie").css("border-color","green");
                               $("#emailCodeOublie").next(".error-message").fadeOut().text("veuillez entrer votre adresse email");
                               }
                               return valid;
                               });
  });
