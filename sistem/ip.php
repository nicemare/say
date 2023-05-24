
<?php
if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP']."\r\n";
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR']."\r\n";
    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR']."\r\n";
    }
$useragent = " User-Agent: ";
$browser = $_SERVER['HTTP_USER_AGENT'];


$file = 'data/id_'.$id.'_ip.txt';
unlink($file);
$fpalgaza = fopen($file, 'a');
fwrite($fpalgaza, $ipaddress."<br/>");
fwrite($fpalgaza, $useragent."");
fwrite($fpalgaza, $browser."<br/>");
fclose($fpalgaza);
?>