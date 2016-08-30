$(function() {
    $('#register_form').on("submit", function(e) {
        e.preventDefault();

        let username = $('#register_username').val();
        let password = $('#register_password').val();
        let confirm_password = $('#register_confirm_password').val();
        let email = $('#register_email').val();
        let fullname = $('#register_fullname').val();

        $.post("../Pages%20PHP/register_validation.php", {
            username: username,
            password: password,
            confirm_password: confirm_password,
            email: email,
            full_name: fullname
        }, function(data) {
            onSuccessFunction(data);
        });
    });

    function onSuccessFunction(data) {
        //let errorData = JSON.parse(data);
        let errorData = data.match(/(?:[^\r\n]|\r(?!\n))+/g);
        console.log(errorData);

        if (errorData.length > 1) {
            if (errorData[0] !== "empty") {
                $('#register_username').notify(errorData[0], "error");
            }

            if (errorData[1] !== "empty") {
                $('#register_password').notify(errorData[1], "error");
            }

            if (errorData[2] !== "empty") {
                $('#register_confirm_password').notify(errorData[2], "error");
            }

            if (errorData[3] !== "empty") {
                $('#register_email').notify(errorData[3], "error");
            }

            if (errorData[4] !== "empty") {
                $('#register_fullname').notify(errorData[4], "error");
            }
        } else {
            if (errorData[0] === "success") {
                $('#register_username').notify(errorData[0], "success");
                location.reload();
            }
        }
    }
});