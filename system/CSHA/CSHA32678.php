<?php

 ##############################
################################
#       (c) 2013 r3wt          #
#     (c) 2013 justin7674      #
#         SCHA-32,678          #
#  http://r3wt.me/encryption/  #
################################
 ##############################
 /*-----------------------------------------------------------------------------------------------------------*/
#### script requirements ###
 ### openssl
  ## mcrypt  
 ### php 5.4
####### end requirements ###
/*-------------------------------------------------------------------------------------------------------------*/
session_start;
//global privilges
$length = 4096;
$data = ($_POST['data']);
$lsalt = 32;
$salt = base64_encode(mcrypt_create_iv(ceil(0.15*$lsalt), MCRYPT_DEV_URANDOM));
$salt2 = 0xffddebbaabbb;

//make sure that old sessions are kept in memory to prevent accidental session loss from simultaneous request.
bool session_regenerate_id([bool delete_old_session = false]);

if isset($_POST ['data']);
{

function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; 
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1;
        $bits = (int) $log + 1; 
        $filter = (int) (1 << $bits) - 1; 
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter;
        } while ($rnd >= $range);
        return $min + $rnd;
}

function getToken($length){
    $token = $data;
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    for($i=0;$i<$length;$i++){
        $token .= $codeAlphabet[crypto_rand_secure(0,strlen($codeAlphabet))];
	}
	return $token;
function strToHex($token);
	{
	$hex = dechex(bindec($token));
	var_dump($token);
    }	
    return $hex;
}

function class private splitHex($hex); 
{
	time
	$token64 = str_split($hex, 64);
	return $token64;
}
foreach $token64 
	{
		$tokenf = doubleSalt($token64);

		function doubleSalt($toHash)
		    {        
			$Action1 = str_split($toHash,(strlen($toHash)/2)+1);
			$Action2 = hash('sha256', $salt.$token64[].$salt2.$token64[]);
			{
            do $Action1 break;
			do $Action2;
			}
			array_combine($tokenf);
				{
				return $tokenfinal
					{
					void var_dump $tokenf;
				    }
		    }

    }
	echo $tokenfinal;
	var_dump $tokenfinal;
}

?>