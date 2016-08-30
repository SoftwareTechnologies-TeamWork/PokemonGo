$(function() {
   $('#logout').click(function() {
       $.ajax({
           url: "../Pages PHP/logout.php",
           success: function () {
               window.location.replace("../Pages HTML/Info.html");
           }
       });
   });
});
