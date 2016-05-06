//verification front de la ville renseignée

$(function(){
  $("#envoyerVille").click(function(){
                        //recuperation au clic
                        
                                 var valid = true;
                                 //si le champ ville est vide
                                 //coloration en rouge
                                 //affichage d un message d erreur
                                    if($("#ville").val() == ""){
                                        $("#ville").css("border-color","red");
                                        $("#ajouter").next(".error-message").fadeIn().text("veuillez entrer votre ville ").css("color","red");
                                            valid = false;
                                    }
                                
                                //verification que le format de la ville est correct
                                //coloration en rouge
                                //affichage d un message d erreur
                                 else if(!$("#ville").val().match(/^[a-z]+$/i)){
                                        $("#ville").css("border-color","red");
                                        $("#ajouter").next(".error-message").fadeIn().text("veuillez entrer un nom de ville valide").css("color","red");
                                            valid = false;
                                 }
                                 else{
                                   
                                   //sinon coloration en vert
                                   //passage a la page suivante
                                        $("#ville").css("border-color","green");
                                    }
                                 return valid;
                                 });
  });
