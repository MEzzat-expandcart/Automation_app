<?php
//error_log("GET -> ".json_encode($_GET));
//error_log("Post -> ".json_encode($_POST));
//error_log("Request -> ".json_encode($_REQUEST));
//error_log("Files -> ".json_encode($_FILES));

// set input values from http to bash script command and run it
if(isset($_POST['storeName'], $_POST['storeUsername'], $_POST['storePassword'], $_POST['storeCode']) &&
    !empty($_POST['storeName']) && !empty($_POST['storeUsername']) &&
    !empty($_POST['storePassword']) && !empty($_POST['storeCode'])) {

    $storeName = escapeshellarg($_POST['storeName']);
    $storeUsername = escapeshellarg($_POST['storeUsername']);
    $storePassword = $_POST['storePassword'];
    $storeCode = escapeshellarg($_POST['storeCode']);

//    $command = 'bash code.sh ' . $storeName . ' ' . $storeUsername. ' ' . $storePassword. ' ' . $storeCode;
//    $output = shell_exec($command);
//    echo "<pre>$output</pre>";

}

// upload folders to server with a predefined directory name
if(isset($_POST['upload'])) {
    if (!empty($_POST['folderName'])) {
        $folderName = $_POST['folderName'];
        if (!is_dir($folderName)) mkdir($folderName);
        foreach ($_FILES['files']['name'] as $i => $name) {
            if (strlen($_FILES['files']['name'][$i]) > 1) {
                move_uploaded_file($_FILES['files']['tmp_name'][$i], $folderName . "/" . $name);
            }
        }
        echo '<script type="text/javascript">window.location.assign("index.php");alert("Folder is successfully uploaded , Please complete Other Configs");</script>';
    } else {
        echo "Upload folder name is empty";
    }
}
