<html>
<head>
<link rel="stylesheet" type="text/css" href="js/jScrollPane/jScrollPane.css" />
<link rel="stylesheet" type="text/css" href="css/chat.css" />
<style>br {height: 1px;}</style>
</head>
<body>
<div id="chatContainer">
    <div id="chatTopBar" class="rounded"></div>
    <div id="chatLineHolder"></div>
    <div id="chatBottomBar" class="rounded">
    	<div class="tip"></div>
        <form id="loginForm" method="post" action="">
            <input id="name" name="name" class="rounded" maxlength="16" />
            <input id="email" name="email" class="rounded" />
            <input type="submit" class="blueButton" value="Login" />
        </form>
        <form id="submitForm" method="post" action="">
            <input id="chatText" name="chatText" class="rounded" maxlength="255" /></br>
            <input type="submit" class="blueButton" value="Submit" />
        </form>
    </div>  
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jScrollPane/jquery.mousewheel.js"></script>
<script src="js/jScrollPane/jScrollPane.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
