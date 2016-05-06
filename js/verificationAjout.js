//verification front lors de la creation d un nouveau compte

$(function(){
  //recuperation lors du clic
  $("#envoyerVille").click(function(){
                           var valid = true;
                           //si les champs sont vides colorer en rouge
                           if($("#ville").val() == ""){
                           $("#ville").css("border-color","red");
                           //si les champs sont non conformes, affichage d un message d erreur
                           $("#villeInscription").next(".error-message").fadeIn().text("veuillez entrer votre ville ").css("color","red");
                           valid = false;
                           }
                           //si la ville a un format incorrect
                           //coloration en rouge
                           //affichage d un message d erreur
                           else if(!$("#ville").val().match(/^[a-z]+$/i)){
                           $("#ville").css("border-color","red");
                           $("#villeInscription").next(".error-message").fadeIn().text("veuillez entrer un nom de ville valide").css("color","red");
                           valid = false;
                           }
                           //sinon coloration des champs en vert et passage a la prochaine page
                           else{
                           $("#ville").css("border-color","green");
                           }
                           return valid;
                           });
  });
