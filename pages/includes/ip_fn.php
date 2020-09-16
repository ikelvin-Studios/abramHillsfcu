 <?php
 function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
 $PublicIP = get_client_ip(); 
 $json  = file_get_contents("https://freegeoip.net/json/$PublicIP");
 $json  =  json_decode($json ,true);
 $country =  $json['country_name'];
 $region= $json['region_name'];
 $city = $json['city'];
 $user_location = $region. ", ".$city.", ".$country;
 $SESSION['user_location'] = $user_location;
 $SESSION['user_ip'] = $PublicIP;

// echo '<script>alert("'.$PublicIP.$city.$region.$country.'")</script>';

 ?>