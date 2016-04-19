 <?php

    $ch = curl_init("http://www.w3schools.com/website/customers_mysql.php"); // add your url which contains json file
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($content, true);
    //print_R($json);
    $count=count($json);
    echo'<table><th>Name</th><th>City</th><th>Country</th>';
    for($i=0;$i<$count;$i++)
    {
      echo '<tr><td>'.$json[$i]['Name'].'</td><td>'.$json[$i]['City'].'</td><td>'.$json[$i]['Country'].'</td></tr>';
    }
    echo'</table>';
    //print_r($content);

?>