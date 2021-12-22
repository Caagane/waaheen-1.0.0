<?php

        // ip address
        $ip = $_SERVER['REMOTE_ADDR'];
        

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://api.ipgeolocation.io/ipgeo?apiKey=1efcce197d964738aa8d47caf22b6123&ip=".$ip);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);     
?>
<h1>Ip Address: <?php echo $ip; ?></h1>
<h1><?php echo $output; ?></h1>