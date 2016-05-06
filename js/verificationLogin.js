//verification front du login 
           $(function(){
                       //recuperation au clic
              $("#envoyerConnexion").click(function(){
                    var valid = true;
                    
                    //verification que le login est rempli
                    //coloration en rouge
                    //afichage d un message d erreur si vide
                        if($("#champLogin").val() == ""){
                                           $("#champLogin").css("border-color","red");
                                           $("#loginConnexion").next(".error-message").fadeIn().text("veuillez entrer votre login").css("color","red");;
                                           valid = false;
                                             }
                                    //verification que le format du login est correct
                                    //coloration en rouge
                                    //afichage d un message d erreur si vide
                                           else if(!$("#champLogin").val().match(/^[a-z]+$/i)){
                                                $("#champLogin").css("border-color","red");
                                                $("#loginConnexion").next(".error-message").fadeIn().text("veuillez entrer un login valide").css("color","red");
                                                    valid = false;
                                            }
                                            
                                            //si le champ est correct colloration en vert
                                            //afichage d un message d acquitement
                                           else{
                                                $("#champLogin").css("border-color","green");
                                                $("#loginConnexion").next(".error-message").fadeOut().text("Votre login est correct");
                                           }
                                        
                        //verification que le mdp est non vide
                        //coloration en rouge
                        //affichage d un message d erreur
                         if($("#champPassword").val() == ""){
                                           $("#champPassword").css("border-color","red");
                                           $("#passwordConnexion").next(".error-message").fadeIn().text("veuillez entrer votre mot de passe ").css("color","red");
                                         valid = false;
                                           }
                                    
                                    //si le champ est correct
                                    //coloration en vert
                                    //affichage d un message d acquitement
                                           else{
                                                $("#champPassword").css("border-color","green");
                                                $("#passwordConnexion").next(".error-message").fadeOut().text("Votre login est correct");
                                                }
                                             return valid;
                                    });
              });
