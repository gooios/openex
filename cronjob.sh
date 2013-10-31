#!/bin/bash
while :

do
sleep 3
echo off
 wget http://127.0.0.1/exchange/cronjob1.php -O Temp --delete-after

 wget http://127.0.0.1/exchange/cronjob2.php -O Temp --delete-after

done
