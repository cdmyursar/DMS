<?php
/**
 * Created by PhpStorm.
 * User: KC
 * Date: 3/10/2016
 * Time: 11:23 AM
 */
$Seq = $_POST['GLSeq'];

include "connect.php";
$list = array ();
$sql = "SELECT GroomingLog.GLTakenBy, GroomingLog.GLSeq, GroomingLog.GLDescription,
GroomingLog.GLGroom, GroomingLog.GLBath, GroomingLog.GLRate, GroomingLog.GLBathRate,
GroomingLog.GLNailsID, GroomingLog.GLOthersID, GroomingLog.GLNailsRate, GroomingLog.GLOthersRate,
Pets.PtPetName, Clients.CLLastName,
Clients.CLFirstName, Clients.CLAddress1, Clients.CLCity, Clients.CLZip, Clients.CLPhone1, Clients.CLPhone2, Clients.CLPhone3, Clients.CLPhone4,
Clients.CLEmail,
Breeds.BrBreed
FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq
WHERE (((GroomingLog.GLSeq)=$Seq))";

$result = $db->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $boolBath=null;
    if($row['GLGroom'] == -1 && $row['GLBath'] == 0){
        $boolBath = "groom";
    }else if($row['GLBath'] == -1 && $row['GLGroom'] == 0){
        $boolBath = "bath";
    }else if($row['GLBath'] == -1 && $row['GLGroom'] == -1 || $row['GLBath'] == 0 && $row['GLGroom'] == 0){
        $boolBath = "NA";
    }
    $list= array(
        'Seq'=>$row['GLSeq'],
        'TakenBy'=>$row['GLTakenBy'],
        'BoolGroom'=>$boolBath,
        'GroomRate'=>$row['GLRate'],
        'BathRate'=>$row['GLBathRate'],

        'BoolNails'=>$row['GLNailsID'],
        'BoolOthers'=>$row['GLOthersID'],
        'NailsRate'=>$row['GLNailsRate'],
        'OthersRate'=>$row['GLOthersRate'],

        'Description'=>$row['GLDescription'],

        'Pet'=>$row['PtPetName'],
        'Breed'=>$row['BrBreed'],

        'LastName'=>$row['CLLastName'],
        'FirstName'=>$row['CLFirstName'],
        'Address'=>$row['CLAddress1'],
        'City'=>$row['CLCity'],
        'Zip'=>$row['CLZip'],
        'Phone1'=>$row['CLPhone1'],
        'Phone2'=>$row['CLPhone2'],
        'Phone3'=>$row['CLPhone3'],
        'Phone4'=>$row['CLPhone4'],
        'Email'=>$row['CLEmail']

    );
}
echo json_encode($list);
?>