<?php



if(!isset($_POST['index'])) {
    header("HTTP/1.0 404 Not Found");
}else {

    require_once '../config/connection.php';
    $index_result = $raffle->selectIndex();
    print_r($index_result);

    if (is_array($index_result['result'])) {
        $column_keys = array_keys($index_result['result']);
        $index_keys = array();

        $count = 0;
        for($i = 2; $i < $index_result['column_count'] - 1; $i++) {
            $index_keys[$count] = $column_keys[$i];
            $count++;
        }
        $count = 0;
        $index = $_POST['index'];
        $index_column = $index_keys[$index];
        
        $raffle->stopIndex($index_column);
        
    } else {
        echo "Error: Result is not an array";
    }
    

    
}