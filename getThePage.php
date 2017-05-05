<?php
function getThePage($page_url)
{
 $options = array(
        CURLOPT_RETURNTRANSFER => true,     // TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "spider", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
      
    );
$ch=curl_init($page_url)or die(curl_errno($ch).":Cannot initialize");
curl_setopt_array($ch,$options)or die(curl_errno($ch).":Cannot set options");
$content=curl_exec($ch)or die(curl_errno($ch).":Cannot execute");

$err=curl_errno($ch);
$errmsg=curl_error($ch);
$header=curl_getinfo($ch);
curl_close($ch);

$header['errno']=$err;
$header['errmsg']=$errmsg;
$header['content']=$content;
return($header);

/*$page_url="http://".$page_url;
$content=file_get_contents($page_url);
return($content);
*/
}
?>

