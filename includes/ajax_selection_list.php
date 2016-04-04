<?php
/**
 * Created by PhpStorm.
 * User: KC
 * Date: 3/10/2016
 * Time: 11:23 AM
 */
include "connect.php";
date_default_timezone_set('America/Chicago');

$list = array ();

$sql = "SELECT GroomingLog.GLTakenBy, GroomingLog.GLSeq, GroomingLog.GLInTime, Pets.PtPetName, Clients.CLLastName,
Breeds.BrBreed
FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq
WHERE (((GroomingLog.GLDate)=Date()))
ORDER BY GroomingLog.GLInTime";

$result = $db->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $sqlTime = $row['GLInTime'];
    $tempTime = str_replace("1899-12-30"," ",$sqlTime);
    $time = ( date("g:i A", strtotime($tempTime)) );

//    echo $time. " ". $row['GLSeq'];

    $list[]= array(
        'Seq'=>$row['GLSeq'],
        'Time'=>$time,
        'Pet'=>$row['PtPetName'],
        'LastName'=>$row['CLLastName'],
        'Breed'=>$row['BrBreed'],
        'TakenBy'=>$row['GLTakenBy']
    );
}
echo json_encode($list);
?>