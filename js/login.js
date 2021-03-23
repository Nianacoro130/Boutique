/* Redirect to route Register*/

$( function(){
                      
    $('#btnlinkR').click(function(event) 
    {
        
        event.preventDefault();

        $('#myModal').modal('hide').fadeOut(300);
        $('#myModalR').modal('show');

    })

});

/*Treatment login form*/
$(function (){

    $("#form1").on("submit",function (event)
    {
        event.preventDefault();

        $.post(
        './membreco.php',
            {
                email : $('#inputEmailC').val(),
                motdepasse : $('#inputMdpC').val()
            },
            
            function(data){
                
                if(data == 1){
                    $('#messageFlash').html('<li>Succes</li>');
                    $('#myModal').fadeOut();
                    document.location.reload();
                }
                else if (data == 0){
                    $('#messageFlash').html('<li>Veuillez remplir tous les champs !</li>');

                }
                else if(data == -1){
                    $('#messageFlash').html('<li>Email non existant !</li>');

                }
                else if (data == -2){
                    $('#messageFlash').html('<li> Mot de passe incorrect!</li>');

                }
                console.log(data);
                console.log($('.messagerFlash'))
                  
            }
            

        ),
        'text'


    })
   
});