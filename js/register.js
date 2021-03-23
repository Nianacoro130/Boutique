//Redirect to modal login

 $( function(){
  
                      
    $('#btnlinkCo').click(function(a) 
    {
       $('#myModalR').modal('hide').fadeOut(300);
       $('#myModal').modal('show');

   })

 });



$(function (){

    $("#form2").on("submit",function (event)
    {
        event.preventDefault();

        $.post(
        './inscription.php/',

            {   nom: $('#inputNom').val(),
                prenom: $('#inputPrenom').val(),
                adresse: $('#inputAdr').val(),
                ville: $('#inputVille').val(),
                codePostal: $('#inputCdp').val(),
                numero: $('#inputNum').val(),
                email : $('#inputMail').val(),
                motdepasse : $('#inputMdp').val(),
                mdpcomfirm : $('#inputMdpCo').val()
            },

            
            function(data){
                
                if(data == 1){
                    $('.messager').html('<li>Succes</li>');
                     $('#myModalR').fadeOut();
                     document.location.reload();
               
                }
                else if (data == 0){
                    $('.messager').html('<li>Veuillez remplir tous les champs!</li>');
                   
                   
                 }
                else if(data == -1){
                     $('.messager').html('<li> Le mail est deja utilisée !</li>');
                    
                  
                }
                 else if (data == -2){
                    $('.messager').html('<li>Veuillez saisir un mot de passe identiques!</li>');
                  
                }
                 else if(data == -3){
                    $('.messager').html("<li>Erreur lors de l'inscription !</li>");
                    
                }

                console.log(data);
                  console.log($('.messager'))
            }
        ),
        'text'

    })

    // var test =  console.log($_POST);
  
});