$(function() {
    let currentDanger = $('#currentDanger').val();
    currentDanger = parseInt(currentDanger);

    $('#dangers_form').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "get_danger.php",
            dataType: "text",
            data: {
                currentDanger: currentDanger
            },
            success: function(data) {
                let array = data.match(/(?:[^\r\n]|\r(?!\n))+/g);
                $('#new_header').text(array[1]);
                $('#new_image').attr("src", array[0]);
                let text = "";
                for (let i = 2; i < array.length; i++) {
                    text += array[i] + "<br><br>";
                }
                $('#new_body').html(text);
            },
        });
    });

    $('#next').click(function () {
        console.log(currentDanger);

        currentDanger += 1;
        showPrevious(currentDanger);
        hideBody(currentDanger);
        hideNext(currentDanger);

        $('#currentDanger').val(currentDanger);
    });

    $('#previous').click(function () {
        console.log(currentDanger);

        currentDanger -= 1;

        hideBody(currentDanger);
        hidePrevious(currentDanger);
        showNext(currentDanger);

        $('#currentDanger').val(currentDanger);
    });

    function hideBody(currentDanger) {
        if (currentDanger != 0) {
            $('.dangers_body').hide();
        }
    }

    function showPrevious(currentDanger) {
        if (currentDanger > 1) {
            $('#previous').show();
        }
    }

    function hidePrevious(currentDanger) {
        if (currentDanger < 2) {
            $('#previous').hide();
        }
    }

    function hideNext(currentDanger) {
        if (currentDanger > 15) {
            $('#next').hide();
        }
    }

    function showNext(currentDanger) {
        if (currentDanger < 16) {
            $('#next').show();
        }
    }
});