var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
    res.send('<h1>Hello world</h1>');
});

io.on('connection', function(socket){
    console.log('a user connected', socket.id);
    socket.on('message', function(msg){
        console.log(msg, 'message');

        io.emit('showmessage', msg);
    });
});

http.listen(3000, function(){
    console.log('listening on *:3000');
});