$(function() {
    $.ajax({
        type: "POST",
        url: "../Pages PHP/is_logged_in.php",
        success: function (data) {
            console.log(data);
            if (data !== "Not logged in.") {
                $('#logged_as').text("Logged as: " + data);
                $('#login').hide();
                $('#logout').show();
                $('#register').hide();
                $('#chat').show();
                $('#quiz').show();
                $('#dangers').show();
                $('#explore').show();
                $('#pokedex').show();
                $('#teams').show();
            } else {
                $('#login').show();
                $('#logout').hide();
                $('#register').show();
                $('#chat').hide();
                $('#quiz').hide();
                $('#dangers').hide();
                $('#explore').hide();
                $('#pokedex').hide();
                $('#teams').hide();
            }
        }
    });
});