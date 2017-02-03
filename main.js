// ActionScript Document
// Calcule l'IMC
$(function() {
    $('#calculer').click(function() {

        var poids = $('#poids').val();
        var taille = $('#taille').val();

        $.post(
            'imc.php', // Un script PHP que l'on va créer juste après
            {
                poids: poids, //$('#poids').val(),  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
                taille: taille //$('#taille').val()
            },

            function(data) { // Cette fonction ne fait rien encore, nous la mettrons à jour plus tard
                $('#imc').val(data.imc);
                $('#msg').val(data.msg);
            },

            'json' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
        );

    });
});
