
$(function(){
  $("#envoyerEmailCodeOublie").click(function(){
                               var valid = true;
                               if($("#champEmailCodeOublie").val() == ""){
                               $("#champEmailCodeOublie").css("border-color","red");
                               $("#emailCodeOublie").next(".error-message").fadeIn().text("veuillez entrer votre adresse email").css("color","red");;
                               valid = false;
                               }
                                     else if(!$("#champEmailCodeOublie").val().match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/)){
                               $("#champEmailCodeOublie").css("border-color","red");
                               $("#emailCodeOublie").next(".error-message").fadeIn().text("veuillez entrer une adresse emailvalide").css("color","red");
                               valid = false;
                               }
                               else{
                               $("#champEmailCodeOublie").css("border-color","green");
                               $("#emailCodeOublie").next(".error-message").fadeOut().text("veuillez entrer votre adresse email");
                               }
                               return valid;
                               });
  });
