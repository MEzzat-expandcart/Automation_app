<?php
error_log("GET -> ".json_encode($_GET));
error_log("Post -> ".json_encode($_POST));
error_log("Request -> ".json_encode($_REQUEST));

if(isset($_POST['storeName'], $_POST['storeUsername'], $_POST['storePassword'], $_POST['storeCode']) &&
    !empty($_POST['storeName']) && !empty($_POST['storeUsername']) &&
    !empty($_POST['storePassword']) && !empty($_POST['storeCode'])) {

    $storeName = escapeshellarg($_POST['storeName']);
    $storeUsername = escapeshellarg($_POST['storeUsername']);
    $storePassword = $_POST['storePassword'];
    $storeCode = escapeshellarg($_POST['storeCode']);

    if(isset($_POST['upload']))
    {
        if($_POST['foldername'] != "")
        {
            $foldername=$_POST['foldername'];
            if(!is_dir($foldername)) mkdir($foldername);
            foreach($_FILES['files']['name'] as $i => $name)
            {
                if(strlen($_FILES['files']['name'][$i]) > 1)
                {  move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$name);
                }
            }
            echo "Folder is successfully uploaded";
        }
        else
            echo "Upload folder name is empty";
    }

//    $command = 'bash code.sh ' . $storeName . ' ' . $storeUsername. ' ' . $storePassword. ' ' . $storeCode;
//    $output = shell_exec($command);
//    echo "<pre>$output</pre>";

}