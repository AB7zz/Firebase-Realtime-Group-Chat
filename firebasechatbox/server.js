//Creating express instance
var express = require("express");
var app = express();

//Creating http instance
var http = require("http").createServer(app);

//Creating socket.io instance
var io = require("socket.io")(http);

io.on("connection", function(socket){
	console.log("User connected", socket.id);

	//attach incoming listener for new user
	socket.on("user_connected", function(username){
		// save in array
		users[username] = socket.id;

		//socket ID will be used to send message to individual person

		//notify all connected clients
		io.emit("user_connected", username);
	});
});

//start the server
http.listen(3000, function(){
	console.log("Server started")
});
