<?phpfunction getIP(){    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)    {        if (array_key_exists($key, $_SERVER) === true)        {            foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)            {                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)                {                    return $ip;				}            }        }    }}function AddMoney($amount, $user, $currency){        $sell = @mysql_query("SELECT * FROM balances WHERE `User_ID`='$user' AND `Coin`='$currency'");        $id = @mysql_result($sell, 0, "id");                if ($id < 1) {                mysql_query("INSERT INTO  balances (`User_ID`,`Amount`,`Coin`,`Pending`) VALUES ('$user','$amount','$currency','0');");            } else {                $old = mysql_result($sell, 0, "Amount");                $new = $old + $amount;                mysql_query("UPDATE balances SET `Amount` = $new WHERE `User_ID` = '$user' AND `Coin` = '$currency';");            }    }	function GetPosts($thread)	{		$sql = mysql_query("SELECT * FROM TicketReplies WHERE `ticket_id` = '$thread'");		$num = @mysql_num_rows($sql);		$x = 0;		for($i = 0;$i < $num; $i++)		{			$x = $x + 1;		}		return $x;	}	function GetUser($owner)	{		$sql = mysql_query("SELECT * FROM userCake_Users WHERE `User_ID`=$owner");		return mysql_result($sql,0,"Username_Clean");	}
	
	function sanitize($str)
	{
		return strtolower(strip_tags(trim(($str))));
	}
	
	function isValidEmail($email)
	{
		return preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",trim($email));
	}
	
	function minMaxRange($min, $max, $what)
	{
		if(strlen(trim($what)) < $min)
		   return true;
		else if(strlen(trim($what)) > $max)
		   return true;
		else
		   return false;
	}
	
	//@ Thanks to - http://phpsec.org
	function generateHash($plainText, $salt = null)
	{
		if ($salt === null)
		{
			$salt = substr(md5(uniqid(rand(), true)), 0, 25);
		}
		else
		{
			$salt = substr($salt, 0, 25);
		}
	
		return $salt . sha1($salt . $plainText);
	}
	
	function replaceDefaultHook($str)
	{
		global $default_hooks,$default_replace;
	
		return (str_replace($default_hooks,$default_replace,$str));
	}
	
	function getUniqueCode($length = "")
	{	
		$code = md5(uniqid(rand(), true));
		if ($length != "") return substr($code, 0, $length);
		else return $code;
	}
	
	function errorBlock($errors)
	{
		if(!count($errors) > 0)
		{
			return false;
		}
		else
		{
			echo "<ul>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
		}
	}
	
	function lang($key,$markers = NULL)
	{
		global $lang;
		
		if($markers == NULL)
		{
			$str = $lang[$key];
		}
		else
		{
			//Replace any dyamic markers
			$str = $lang[$key];

			$iteration = 1;
			
			foreach($markers as $marker)
			{
				$str = str_replace("%m".$iteration."%",$marker,$str);
				
				$iteration++;
			}
		}
		
		//Ensure we have something to return
		if($str == "")
		{
			return ("No language key found");
		}
		else
		{
			return $str;
		}
	}
	
	function destorySession($name)
	{
		if(isset($_SESSION[$name]))
		{
			$_SESSION[$name] = NULL;
			
			unset($_SESSION[$name]);
		}
	}
?>