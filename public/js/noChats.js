$(document).ready(function () {
    $("#chatBox").animate({ scrollTop: $('#chatBox').prop("scrollHeight")}, 1000);
    var stamp = new Date().toISOString().slice(0, 19).replace('T', ' ');

    //encode html
    function htmlEscape(str) {
        return str
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    }

    //retrieve new message
    setInterval(function () {
        //generate timestamp to compare to database

        var $to = $("#from").val();
        $.ajax({
            type: 'GET',
            url: baseUrl + '/messages/refresh',
            data: {timestamp: stamp, from: $to},
            success: function ( data ) {
                data.forEach(function(obj) {
                    if (obj.message !== undefined) {
                        console.log(obj);
                        console.log('stamp ' + obj.message);
                        stamp = obj.created_at;
                        $("#chatBox").append("<div class='col-md-6 chats chat-from'> <p>" + htmlEscape(obj.message) + "</p> </div> <div class='clearfix'></div>")
                        // $("#chatBox").append("<div class='col-md-6 chats chat-from'> <p>" + obj.message + "</p> </div> <div class='clearfix'></div>")
                    }
                });
            }
        });
    }, 3000);

    //send message
    $("#chatText").keypress(function (e) {
        if (e.which === 13 && ($(this).val() !== "")) {
            var $message = $("#chatText").val();
            var $to = $("#from").val();
            $("#chatBox").append("<div class='col-md-6 chats chat-to pull-right'> <p>" + htmlEscape($message) + "</p> </div> <div class='clearfix'></div>");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: baseUrl + '/home/send',
                data: {msg: $message, to: $to}
            });

            $("#chatText").val("");
        }
    });

});