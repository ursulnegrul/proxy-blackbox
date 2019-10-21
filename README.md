# Proxy Blackbox
Black Box Proxy Block - An attempt to continue the discontinued public interface http://proxy.mind-media.com/block/


Usage example:

    <?php

    require 'BlackBox/IP.php';

    $ip = $_SERVER['REMOTE_ADDR'];

    $DB = new \PDO('mysql:host=localhost;dbname=blocklist;', 'user', 'password');
    
    # OR
    
    $DB = new \PDO('sqlite:blocklist.sq3');

    $BlackBox = new IP($DB);

    if($BlackBox->exists($ip)){
        echo 'You are using proxy';
    }


