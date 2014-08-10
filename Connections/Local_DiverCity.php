<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_Local_DiverCity = "localhost";
$database_Local_DiverCity = "z6000536_movil";
$username_Local_DiverCity = "z6000536_movil";
$password_Local_DiverCity = "Bigbolivia1";
$Local_DiverCity = mysql_pconnect($hostname_Local_DiverCity, $username_Local_DiverCity, $password_Local_DiverCity) or trigger_error(mysql_error(),E_USER_ERROR); 
?>