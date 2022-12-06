Curl : ham apne page pe rahte huye bhi kisi dusre server se data access kar sakte hai.
Curl is one of the most powerful PHP extensions, it stands for client URL, and allows you to communicate with other servers.

curl_init : initialize a cURL session return a "handle" onject ($ch)

curl_setopt : set an option for a cURL transper. common option (URL,POST data)

curl_exec : perform a cURL session

curl_close : close a cURL session

curl_copy_handle : Copy a cURL handle along with all of its preferences.

curl_errno : return the last error number.

curl_error : return a string containing the last error for the current session.

curl_getinfo: Get information regarding a specific transfer.

curl_setopt_array : Set multiple options for a cURL transfer.

curl_version : Gets cURL versons information.

option:=
CURLOPT_HEADER true to include the headerin the output.

CURLOPT_PORT An alternative port number to connect to.

CURLOPT_HTTPHEADER : An array of HTTP header fields to set.





=================

<?php 
// $ch=curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://www.google.com');
// curl_exec($ch);
// curl_close($ch);


// $ch=curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/users');
// // curl_setopt($ch,CURLOPT_POSTFIELDS,"id=33");
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
// $result=curl_exec($ch);
// curl_close($ch);
// print_r($result);


//How to pass header info
$header[0]="Accept: application/json";
$header[]="Content-Type:application/json";
$header[]="Cache-Control:max-age=0";
$header[]="Connection:keep-alive";
$header[]="Keep-Alive:300";
$header[]="Accept-Charset:utf-8;q=0.7";
$header[]="Accept-Language:en;q=0.5";
$header[]="Pragm";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/users');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);

$result=curl_exec($ch);
curl_close($ch);
print_r($result);

	
?>
