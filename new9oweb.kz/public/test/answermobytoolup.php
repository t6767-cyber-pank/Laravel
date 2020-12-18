<?php
$mobileno = $_GET["mobilNo"]; //'+996700361662';
$srcnumber= '77077163645';
$md5str = "30c6eda98d306cf3a1d17d36f56dbbe0";                                                   
//$url = "http://koh.loc/api/testToPup?";
$url = "http://resellers-dev.mobitopup.com/api/testToPup?";
$key='H4m7nj2n39J';
$login=$_GET["Login"]; //"3676";
$message="message77";
$product=$_GET["value"];;
$passw= $_GET["pass"]; //"timur777999";
$md = md5($login . $passw . $key);
		
$Response = httpsPost($url, $login, $key, $md, $mobileno,$srcnumber,$message,$product); 
echo "Response<br>";
echo "<pre>";
var_dump($Response);
echo "</pre>";

function httpsPost($Url, $pLogin,$pKey,$pMd5,$pMobile,$srcnumber,$message,$product)
{
$curl_handle=curl_init();                                      
$post_url = $Url . "login=$pLogin&key=$pKey&destnumber=$pMobile&md5=$pMd5&srcnumber=$srcnumber&message=$message&product=$product";
curl_setopt($curl_handle,CURLOPT_URL,$post_url);
curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,4);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,2);
echo "post_url<br>";
echo "<pre>";
var_dump($post_url);
echo "</pre>";
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
if (empty($buffer))
{
    return "NA";
}
else
{
    return $buffer;
}
}
?>