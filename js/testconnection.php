<?php


$host = 'localhost';
$user = 'root';
$password = 'P@ssw0rd';
$db = 'test';
// connection
$return = [
    "question" =>[],
    "answer" =>[
        "tru" =>[],
        "false" => []
    ]
];
$con = mysqli_connect($host,$user,$password,$db);

mysqli_query($con,"SET NAMES UTF8");



$sql = "SELECT `quest_range`, `quest`, `ans_true`, `false_1`, `false_2`, `false_3` FROM questions WHERE quest_range = '1'
                ORDER BY RAND()
                LIMIT 5";
         $result = mysqli_query($con, $sql); 
        while($row = mysqli_fetch_assoc($result))
        { 

            $GLOBALS['return']['question'][] = $row['quest'];
            $GLOBALS['return']['answer']['tru'][] = $row['ans_true'];
            $GLOBALS['return']['answer']['false'][] = [$row['false_1'],$row['false_2'],$row['false_3']];




   
        }
        print_r($return);

?>