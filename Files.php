<?php

/*
    All the uploaded files are stored in a temporary location until the application scripts move them to persistent storage. 
    $_FILES is an associative array with the form of an input name as an entry key and the upload information as an entry value.
*/

$uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads';
$targetFileName = $uploadDir . DIRECTORY_SEPARATOR . 'download copy.png';
$relativeFileName = substr($targetFileName, strlen(__DIR__));

if(array_key_exists('uploadFile', $_FILES)){
    $uploadInfo = $_FILES['uploadFile']; //MIME, tmp_name, error, size ...
    print_r($uploadInfo);

    switch($uploadInfo['error']){
        case UPLOAD_ERR_OK:
            print('Upload successful');

            if(mime_content_type($uploadInfo['tmp_name']) !== 'image/png') {
                echo sprintf('The uploaded file [%s] is NOT jpeg format');
            } else {
                //Move uploaded file from temp directory to the persistent storage (targetFileName)
                if(!move_uploaded_file($uploadInfo['tmp_name'], $targetFileName)) {
                    echo 'Cannot save the image to a persistent storage!';
                } else {
                    echo 'Moving successful!';
                }
            }
            
        case UPLOAD_ERR_INI_SIZE:
            echo sprintf('Failed to upload [%s]. Too big', $uploadInfo['name']);
        break;
        case UPLOAD_ERR_NO_FILE:
            echo 'No file was uploaded';
        break;

        default:
            echo sprintf('Failed to upload [%s]: error code [%d]', $uploadInfo['name'], $uploadInfo['error']);
    }

    
} ?>

<!DOCTYPE html>
<html>
    <body>

        <form action="./Files.php" method="post" enctype="multipart/form-data">
            <input type="file" name="uploadFile">
            <input type="submit" value="Upload">
        </form>

    </body>
</html>