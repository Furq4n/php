$sendData = chr(6).chr(0).chr(255).chr(255).'info';
function sendAndGetResponse(192.168.0.99, 8181, $sendData){
$socketHandler=@fsockopen(192.168.0.99, 8181, $errno, $errstr, 1);
if(!$socketHandler)
{
    return false; //offline
}
else
{
    $response = '';
    stream_set_timeout($socketHandler, 2);
    fwrite($socketHandler, $sendData);
    while (!feof($socketHandler))
    {
        stream_set_timeout($socketHandler, 2);
        $response .= fgets($socketHandler, 1024);
    }
    fclose($socketHandler);
    return $response;
}
}
