<?php
/**
 * Created by PhpStorm.
 * User: KC
 * Date: 3/10/2016
 * Time: 11:23 AM
 */
//header("content-type:application/json");

include "includes/connect.php";
//date_default_timezone_set('America/Chicago');

//$list = array ();
//$sql = "SELECT GroomingLog.GLTakenBy, GroomingLog.GLSeq, GroomingLog.GLInTime, Pets.PtPetName, Clients.CLLastName,
//Breeds.BrBreed
//FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq
//WHERE (((GroomingLog.GLDate)=Date()))
//ORDER BY GroomingLog.GLInTime";
//$result = $db->query($sql);
//
//while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//    $sqlTime = $row['GLInTime'];
//    $tempTime = str_replace("1899-12-30"," ",$sqlTime);
//    $time = ( date("g:i A", strtotime($tempTime)) );
//
//    $list[]= array(
//        'Seq'=>$row['GLSeq'],
//        'Time'=>$time,
//        'Pet'=>$row['PtPetName'],
//        'LastName'=>$row['CLLastName'],
//        'Breed'=>$row['BrBreed'],
//        'TakenBy'=>$row['GLTakenBy']
//    );
//}
//var_dump($list);
//echo json_encode($list);








$sql = "SELECT GroomingLog.GLTakenBy, GroomingLog.GLSeq, Pets.PtPetName, Clients.CLLastName,
Breeds.BrBreed
FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq
WHERE (((GroomingLog.GLSeq)=4857))";

$result = $db->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $list= array(
        'Seq'=>$row['GLSeq'],
        'Pet'=>$row['PtPetName'],
        'LastName'=>$row['CLLastName'],
        'Breed'=>$row['BrBreed'],
        'TakenBy'=>$row['GLTakenBy']
    );
}
var_dump($list);



/*//Put form elements into post variables (this is where you would sanitize your data)
$field1 = @$_POST['field1'];
//Establish values that will be returned via ajax
$return = array();
$return['msg'] = '';
$return['error'] = false;
//Begin form validation functionality
if (!isset($field1) || empty($field1)){
    $return['error'] = true;
    $return['msg'] .= '<li>Error: Field1 is empty.</li>';
}
//Begin form success functionality
if ($return['error'] === false){
    $return['msg'] = '<li>Success Message</li>';
}
//Return json encoded results
echo json_encode($return);*/
?>