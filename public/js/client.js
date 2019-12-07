var socket = io('http://localhost:3000');

$('.send').click(function () {
    socket.emit('message', {
        msg: $('.msg').val(),
        name: $('.send').data('name')
    });

    $('.msg').val('');
});

socket.on('showmessage', function (msg) {
    showmessage(msg);
});

function showmessage(msg) {
    $('.message-board').append('<p> ' + msg.name + ': ' + msg.msg);
}