<?php
require_once("models/config.php");

//probably best to move these values to models/config. for now we leave it.
$title="OpenEx";
$alert= "<strong>the ".$pagename." is down for maintenance.</strong>";
?>
<html>
<head>
	<meta name="viewport" content="initial-scale=1">
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<link rel="apple-touch-icon" href="assets/img/favicon.png" />
	<link href="assets/css/mobile.css" type="text/css" rel="stylesheet" />
	<title><?php echo $title; ?></title>
</head>
<body>
<b>Hi, welcome to OpenEx for mobile. Used the tabs below to navigate.</b>
<a class="handle" href="#Overview">Overview</a><a class="handle" href="#Chat">Chat</a><a class="handle" href="#Markets">Markets</a>
<div id="Top" class="container clearfix">
	<header class="website-header color">
	<center>
	<h1 class="Head_T"><a class="Head_A" href="http://openex.pw"><?php echo $title; ?></a></h1>
	</center>
		<div id="mobile_nav">
		
		<ul id="mobile_nav" class="Head_B">
			<?php $account = $loggedInUser->display_username; if(isUserLoggedIn()){ echo "<li><a href='mobile.php?page=account'>Account</a></li><li><a href='mobile.php?page=support'>Support</a></li><li><a href='mobile.php?page=logout'>Logout</a></li>"; } else { echo "<li><a href='mobile.php?page=login'>Login</a></li><li><a href='mobile.php?page=register'>Register</a></li>"; } ?>
			<li><a href='mobile.php?page=about'>About</a></li>
        </ul>
		</div>
	</header>
		<section class="content color">
																	<?php

												if($_GET["page"] == "")

												{

													if(isUserLoggedIn())

													{
                                                        echo "<a href='mobile.php?page=logout'>Click Here To Logout</a>";
														include("pages/account.php");

													}

													else

													{

														include("pages/mobile_only/landing.php");

													}

												}

												else

												{

													include("pages/".$_GET["page"].".php");

												}

											?>	
		</section>
		<aside class="sidebar color">
		<table>
		</aside>
</div>
<div style="height: 800; width:100% padding: 0;" />
</br>
<a class="handle" href="#Chat">Chat</a><a class="handle" href="#Markets">Markets</a>
	<div id="Markets" class="slide-out-div">
			
	<p><tr>
        <td>
          <b id="Mrkt_H">BTC Markets</b><br />

          <ul id="market-list">
            <li><a href='http://openex.pw/mobile.php?page=trade&market=10'>BTC/CGB</a></li>

            <li><a href='http://openex.pw/mobile.php?page=trade&market=6'>BTC/CPR</a></li>
			
			<li><a href='http://openex.pw/mobile.php?page=trade&market=7'>BTC/FRK</a></li>

            <li><a href='http://openex.pw/mobile.php?page=trade&market=9'>BTC/GLD</a></li>

            <li><a href='http://openex.pw/mobile.php?page=trade&market=2'>BTC/LTC</a></li>
			
			<li><a href='http://openex.pw/mobile.php?page=trade&market=8'>BTC/MEC</a></li>

            <li><a href='http://openex.pw/mobile.php?page=trade&market=4'>BTC/NVC</a></li>
			
			<li><a href='http://openex.pw/mobile.php?page=trade&market=3'>BTC/OSC</a></li>

            <li><a href='http://openex.pw/mobile.php?page=trade&market=5'>BTC/UNO</a></li>

            <li><a href='http://openex.pw/mobile.php?page=trade&market=11'>BTC/XPM</a></li>
          </ul>
          <b id="Mrkt_H">LTC Markets</b><br />

          <ul id="market-list">

            <li><a href='http://openex.pw/mobile.php?page=closed'>LTC/BUK</a></li>

            <li><a href='http://openex.pw/mobile.php?page=closed'>LTC/DBL</a></li>

            <li><a href='http://openex.pw/mobile.php?page=closed'>LTC/NET</a></li>
          </ul>
        </td>
      </tr>
	</p>
    </table>
    </div>
	<div style="height: 800; width:100% padding: 0;" />
	<a class="handle" href="#Chat">Chat</a><a class="handle" href="#Markets">Markets</a>
    <div id="#Chat">
			<?php 
			// if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
			echo'<iframe src="chatbox/chat.php" style="width: 100% height: 400;" scrolling="no" frameBorder="0"></iframe>'; 
			/*
			else
			echo 'something went wrong with chat. contact administrator'; 
			*/
			?>
    </div>	
</body>
</html>