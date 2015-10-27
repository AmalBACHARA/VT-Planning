<?php

    $sql="SELECT * FROM ressources_groupes WHERE deleted='0' order by nom ";
    $req_groupes=$dbh->prepare($sql);
    $req_groupes->execute(array());
    $res_groupes=$req_groupes->fetchAll();
    $allGroupes = array();
    foreach($res_groupes as $resGroupes)
    {
            $groupe = array('codeGroupe' => $resGroupes['codeGroupe'], 'nom' => $resGroupes['nom'], 'alias' => $resGroupes['alias']);
            array_push($allGroupes, $groupe);
    }
    $req_groupes->closeCursor();
?>