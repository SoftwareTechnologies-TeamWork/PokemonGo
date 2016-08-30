$(function() {
    $('#submitmsg').click(function() {
        let clientmsg = $('#usermsg').val();
        $.post("../Pages PHP/post.php", {text: clientmsg});
        $('#usermsg').val("");
        return false;
    });

    function loadLog() {
        $.ajax({
            type: "POST",
            url: "../Pages PHP/load.php",
            cache: false,
            success: function(html) {
                $('#chatbox').html(html);
            }
        });
    }

    setInterval (loadLog, 2500);
});