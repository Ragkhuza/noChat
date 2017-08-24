$(document).ready(function () {
    $("#chatText").keypress(function (e) {
        if (e.which === 13) {
            $("#chatBox").append("<div class='col-md-6 chats chat-to pull-right'> <p>" + $("#chatText").val() + "</p> </div> <div class='clearfix'></div>");
            $("#chatText").val("");
        }
    });

});