<?php
//error_log("GET -> ".json_encode($_GET));
//error_log("Post -> ".json_encode($_POST));
//error_log("Request -> ".json_encode($_REQUEST));
//error_log("Files -> ".json_encode($_FILES));

// set input values from http to bash script command and run it
if(isset($_POST['storeName'], $_POST['storeUsername'], $_POST['storePassword'], $_POST['storeCode']) &&
    !empty($_POST['storeName']) && !empty($_POST['storeUsername']) &&
    !empty($_POST['storePassword']) && !empty($_POST['storeCode'])) {

//    $storeName = escapeshellarg($_POST['storeName']);
//    $storeUsername = escapeshellarg($_POST['storeUsername']);
//    $storePassword = $_POST['storePassword'];
//    $storeCode = escapeshellarg($_POST['storeCode']);

    #################### Declaring Variables ####################

    #placeholder variables   (Don't change)
    $varPlaceHolderStoreUrl="storeurl";
    $varPlaceHolderStoreUsername="storeusername";
    $varPlaceHolderStorePassword="storepassword";
    $varPlaceHolderStoreCode="storecode";
    $varPlaceHolderStorePachageId="com.automation.test";
    $varPlaceHolderENStoreName="enstorename";
    $varPlaceHolderARStoreName="arstorename";
    $varPlaceHolderIOSName="iosNameHere";
    $varPlaceHolderIOSBundle="com.expand.cart";


    # store variables
    $varStoreName= escapeshellarg($_POST['storeName']) ?? "halagtalmadina.com";
    $varStoreUsername= escapeshellarg($_POST['storeUsername']) ?? "KJayZ7EF86";
    $varStorePassword= escapeshellarg($_POST['storePassword']) ?? "cbrvoCd1aZh09WX";
    $varStoreCode= escapeshellarg($_POST['storeCode']) ?? "KQJGVB4732";

    #android specific variables
    $varStorePackage= escapeshellarg($_POST['storePackage']) ?? "com.automation.test";
    $varStoreEnName= escapeshellarg($_POST['storeEnName']) ?? "English name";
    $varStoreArName= escapeshellarg($_POST['storeArName']) ?? "Arabic name";

    #ios specific variables
    $varIOSName= escapeshellarg($_POST['IOSName']) ?? "automation name";
    $varIOSBundle= escapeshellarg($_POST['IOSBundle']) ?? "com.test.automation";

    // get config.constants.ts file
    $configConstantsFile = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/src/constants/config.constants.ts');
    $configConstantsFile = str_replace($varPlaceHolderStoreUrl, $varStoreName, $configConstantsFile);
    $configConstantsFile = str_replace($varPlaceHolderStoreUsername, $varStoreUsername, $configConstantsFile);
    $configConstantsFile = str_replace($varPlaceHolderStorePassword, $varStorePassword, $configConstantsFile);
    $configConstantsFile = str_replace($varPlaceHolderStoreCode, $varStoreCode, $configConstantsFile);
    // save config.constants.ts file
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/src/constants/config.constants.ts', $configConstantsFile);

    // package id file
    $packageIdFile1 = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/_BUCK');
    $packageIdFile1 = str_replace($varPlaceHolderStorePachageId, $varStorePackage, $packageIdFile1);
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/_BUCK', $packageIdFile1);

    $packageIdFile2 = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/build.gradle');
    $packageIdFile2 = str_replace($varPlaceHolderStorePachageId, $varStorePackage, $packageIdFile2);
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/build.gradle', $packageIdFile2);

    $packageIdFile3 = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/google-services.json');
    $packageIdFile3 = str_replace($varPlaceHolderStorePachageId, $varStorePackage, $packageIdFile3);
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/google-services.json', $packageIdFile3);

    $packageIdFile4 = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/AndroidManifest.xml');
    $packageIdFile4 = str_replace($varPlaceHolderStorePachageId, $varStorePackage, $packageIdFile4);
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/AndroidManifest.xml', $packageIdFile4);

    $packageIdFile5 = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/java/com/expandcart/MainActivity.java');
    $packageIdFile5 = str_replace($varPlaceHolderStorePachageId, $varStorePackage, $packageIdFile5);
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/java/com/expandcart/MainActivity.java', $packageIdFile5);

    $packageIdFile6 = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/java/com/expandcart/MainApplication.java');
    $packageIdFile6 = str_replace($varPlaceHolderStorePachageId, $varStorePackage, $packageIdFile6);
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/java/com/expandcart/MainApplication.java', $packageIdFile6);


    # # android English name
    $androidLanguagesFile = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/res/values/strings.xml');
    $androidLanguagesFile = str_replace($varPlaceHolderENStoreName, $varStoreEnName, $androidLanguagesFile);
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/res/values/strings.xml', $androidLanguagesFile);

    # # android Arabic name
    $androidLanguagesFile = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/res/values-ar/strings.xml');
    $androidLanguagesFile = str_replace($varPlaceHolderARStoreName, $varStoreArName, $androidLanguagesFile);
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Automation/mobileapp/android/app/src/main/res/values-ar/strings.xml', $androidLanguagesFile);

    #ios specific variables
    $varIOSName= $_POST['IOSName'] ?? "automation name";
    $varIOSBundle= $_POST['IOSBundle'] ?? "com.test.automation";

    $command = "osascript -e 'tell app \"Terminal\" to do script \"new  /Applications/XAMPP/xamppfiles/htdocs/Automation/ 
    open /Applications/XAMPP/xamppfiles/htdocs/Automation/build.sh\"'";

    $output = shell_exec($command);
    echo "<pre>$output</pre>";

}

// upload folders to server with a predefined directory name process
if(isset($_POST['upload'])) {
    if (!empty($_POST['folderName'])) {
        $folderName = $_POST['folderName'];
        if (!is_dir($folderName)) mkdir($folderName);
        move_uploaded_file($_FILES['files']['tmp_name'], $folderName . "/" . $_FILES['files']['name']);
        $zip = new ZipArchive();
        if ($zip->open($folderName . "/" . $_FILES['files']['name'])) {
            $zip->extractTo(__DIR__.'/'.$folderName);
            $zip->close();
            unlink($folderName . "/" . $_FILES['files']['name']);
            echo '<script type="text/javascript">window.location.assign("index.php");alert("Folder is successfully uploaded , Please complete Other Configs");</script>';
        } else {
            echo 'Error the zip file is corrupted';
        }

    } else {
        echo "Upload folder name is empty";
    }
}


// download package file process
if(isset($_GET['path']))
{
    //Read the url
    $url = $_GET['path'];

    //Clear the cache
    clearstatcache();

    //Check the file path exists or not
    if(file_exists($url)) {

    //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($url).'"');
        header('Content-Length: ' . filesize($url));
        header('Pragma: public');

    //Clear system output buffer
        flush();

    //Read the size of the file
        readfile($url,true);

    //Terminate from the script
        die();
    }
    else{
        echo "File path does not exist.";
    }
}
echo "File path is not defined.";
