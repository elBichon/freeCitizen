            $(function(){
              $("#envoyerConnexion").click(function(){
                    var valid = true;
                        if($("#champLogin").val() == ""){
                                           $("#champLogin").css("border-color","red");
                                           $("#loginConnexion").next(".error-message").fadeIn().text("veuillez entrer votre login").css("color","red");;
                                           valid = false;
                                             }
                                           else if(!$("#champLogin").val().match(/^[a-z]+$/i)){
                                                $("#champLogin").css("border-color","red");
                                                $("#loginConnexion").next(".error-message").fadeIn().text("veuillez entrer un login valide").css("color","red");
                                                    valid = false;
                                            }
                                           else{
                                                $("#champLogin").css("border-color","green");
                                                $("#loginConnexion").next(".error-message").fadeOut().text("veuillez entrer votre login");
                                           }
                         if($("#champPassword").val() == ""){
                                           $("#champPassword").css("border-color","red");
                                           $("#passwordConnexion").next(".error-message").fadeIn().text("veuillez entrer votre mot de passe ").css("color","red");
                                         valid = false;
                                           }
                                           else{
                                                $("#champPassword").css("border-color","green");
                                                $("#passwordConnexion").next(".error-message").fadeOut().text("veuillez entrer votre login");
                                                }
                                             return valid;
                                    });
              });
