$(function() {
    $('#login_form').on("submit", function(e) {
        e.preventDefault();

        let username = $('#login_username').val();
        let password = $('#login_password').val();

        $.ajax({
            type: "POST",
            url: "../Pages PHP/login.php",
            data: {
                username: username,
                password: password
            },
            success: function (data) {
                console.log(data);
                if (data === "success") {
                    location.reload();
                } else {
                    $('#login_password').notify(data, "error");
                }
            }
        });
    });
});