$(function() {
    $('#submitmsg').click(function() {
        let clientmsg = $('#usermsg').val();
        $.post("post.php", {text: clientmsg});
        $('#usermsg').val("");
        return false;
    });

    function loadLog() {
        $.ajax({
            type: "POST",
            url: "load.php",
            cache: false,
            success: function(html) {
                $('#chatbox').html(html);
            }
        });
    }

    setInterval (loadLog, 2500);
});