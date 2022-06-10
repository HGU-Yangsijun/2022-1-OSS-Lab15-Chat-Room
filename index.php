<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>HeesTalk</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script >
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function() {
				if(req.readyState == 4 && req.status == 200){
					document.getElementById('chat').innerHTML = req.responseText;	
				}
			}
			req.open('GET','chat.php',true);
			req.send();
		}
		setInterval(function() {ajax()}, 1000);
	</script>
</head>
<body onload="ajax();">
	<!-- <h2 align="center" style="border-bottom: 1px solid grey;"> HeesTalk</h2> -->
	<img src="./images/HeesTalk_logo.png">
	<div class="ibox-content">
        <div class="row">
            <div style="margin-left: 10%;" class=" col-md-10">
                <div class="chat-discussion">
                    <div class="chat-message left">
                        <div id="chat"></div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<div style="background-color: #F1F0EC;" class="row">
     	<div style="margin-left: 20%;" class="col-md-8">
			<form method="POST" action="index.php" style="width: 100%; display: flex;">
				<div style="flex: 8; float: left; margin-right: 10px">
					<input type="text" name="name" placeholder="Enter your name" required="">
					<textarea name="message" placeholder="Enter your message" required=""></textarea>
				</div>
				<div style="flex: 2; float: left">
					<input type="submit" style="color: white;" name="submit" value="Send it"/>
				</div>
			</form>
		</div>
	</div>
	<div class="footer">
		Developed by : <a href="https://github.com/nikhilamin073">Nikhil Amin</a> & <a href="https://github.com/HGU-Yangsijun">Yang Sijun</a>
	</div>
	<?php
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$message = $_POST['message'];
			$query = "INSERT INTO chat (name, message) VALUES ('$name','$message')";
			$run = $con -> query($query);

			if($run){
				?>
				<audio src='audio/notification.mp3' hidden='true' autoplay='true'>
				<?php
			}
		}
	?>
</body>
</html>