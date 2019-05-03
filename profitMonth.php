<?php 
    try{
    $host   = 'localhost';
    $dbname = 'serviceo_stcmembers_v1';
    $user   = 'serviceo_stcmem';
    $pass   = '4dTM9L#-I90B';
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
    }catch(Exception $exc){
    echo $exc->getMessage();    
    }
    function getallTrade($month,$year,$day = 0){
         global $db;
         date_default_timezone_set('offset');
         $time_finalised = mktime(0,0,0,$month,1,$year);
         $query = "SELECT nbjvf_user_trades.trade_id,nbjvf_trades.trade_status FROM nbjvf_user_trades INNER JOIN nbjvf_trades ON nbjvf_user_trades.trade_id = nbjvf_trades.id ORDER BY nbjvf_trades.id ASC  WHERE user_id = 246 AND nbjvf_trades.time_finalised < '".
         date('Y-m-d H:i:s',$time_finalised)."'";
         $ex = $db->query($query);
         return $ex;
    }
    $a = getallTrade(6,2014,$day = 0);
    foreach($a as $b){
            echo $b['trade_status'].'</br>';
    }
    

?>