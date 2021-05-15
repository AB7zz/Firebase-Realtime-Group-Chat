<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Inesrt YOUR Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDg2sf353gq345gesqstRpJHzFCaqHwk",
    authDomain: "my-test-project-a6969.firebaseapp.com",
    projectId: "my-test-project-a6969",
    storageBucket: "my-test-project-a6969.appspot.com",
    messagingSenderId: "566523232353597",
    appId: "1:56654829597:web:c727592d8135635671d458cef4"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  var myName = prompt("Enter your name");

  function sendMessage(){
  	var message = document.getElementById("messaage").value;
  	firebase.database().ref("messages").push().set({
  		"sender": myName,
  		"message": message
  	});
  	return false;
  }

  firebase.database().ref("messages").on("child_added", function(snapshot){
  	var html = "";
  	html += "<li>";
  	html += snapshot.val().sender + ": " + snapshot.val().message;
  	html += "</li>";

  	document.getElementById("messages").innerHTML += html;
  });
</script>

<form onsubmit="return sendMessage();">
	<input id="messaage" placeholder="Enter Message" autocomplete="off">
	<input type="submit">
</form>

<ul id="messages"></ul>
