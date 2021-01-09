<?php
// En attendant de voir les BDD, on stock nos donées dans un  fichier
// et dans un variable $data
// pour conserver les données d'un utilisateur à l'autre, pour que tout
//le monde voit les derniers témoignages, on sauve chaque nouveau témoignage
// dans le fichier data/kiemtaos.php
// saveKiemtaos écrase et réecrit tout le contenue du fichier data/kiemtaos.php
function saveKiemtaos($kiemtaoArray) {
    if (is_array($kiemtaoArray)) {
        $phpContent = '<?php'.PHP_EOL.PHP_EOL;
        $phpContent .= '$data = '.var_export($kiemtaoArray,1).';'.PHP_EOL;
        file_put_contents('data/kiemtaos.php', $phpContent);

        return true;
    }
    else {
        echo '$kiemtaoArray n\'est pas un tableau<br>';
        return false;
    }
}

function loadKiemtaos() {
    // est-ce que 'data/kiemtaos.php' existe ?
    if (file_exists('data/kiemtaos.php')) {
        //Alors on l'inclut et on retourne $date
        include 'data/kiemtaos.php';
        return $data;
    }
    else {
        echo 'le fichier de données "data/kiemtaos.php" n\'existe pas<br>';
    }

    return false;
}  