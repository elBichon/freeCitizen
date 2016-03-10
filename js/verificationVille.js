$(function(){
  $("#envoyerVille").click(function(){
                                 var valid = true;
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
                                 return valid;
                                 });
  });