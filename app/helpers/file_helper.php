<?php

function uploadImage()
{
    // Use fileinfo to get the mime type
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->file($_FILES["image"]["tmp_name"]);

    $mime_types = ["image/gif", "image/png", "image/jpeg"];

    if (!in_array($mime_type, $mime_types)) {
        exit("Invalid file type");
    }

    // Replace any characters not \w- in the original filename
    $pathinfo = pathinfo($_FILES["image"]["name"]);
    $base = $pathinfo["filename"];
    $base = preg_replace("/[^\w-]/", "_", $base);
    $filename = $base . "." . $pathinfo["extension"];


    $upload_dir = "";

    if ($_SERVER['DOCUMENT_ROOT'] == 'C:/xampp/htdocs') {
        $upload_dir = UPLOAD_DIR;
    } else {
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/public/uploads/";

        
    }

    if (! file_exists($upload_dir)) { // if not exists
        mkdir($upload_dir, 0777, true); // create folder with read/write permission.
    }

    $destination = $upload_dir . $filename;

    // Add a numeric suffix if the file already exists
    $i = 1;

    while (file_exists($destination)) {

        $filename = $base . "($i)." . $pathinfo["extension"];
        $destination = $upload_dir . $filename;

        $i++;
    }

    // Change image size
    $fn = $_FILES['image']['tmp_name'];
    $sourceProperties = getimagesize($fn);
    $uploadImageType = $sourceProperties[2];
    $sourceImageWidth = $sourceProperties[0];
    $sourceImageHeight = $sourceProperties[1];

    if ($sourceImageWidth > 800) {
        $new_width = 800;
        $ratio = $sourceImageHeight / $sourceImageWidth;
        $new_height = $ratio * $new_width;

        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fn);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                imagejpeg($imageLayer, $destination);
                break;

            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fn);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                imagegif($imageLayer, $destination);
                break;

            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fn);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                imagepng($imageLayer, $destination);
                break;
        }
    }

    return $filename;
}

function resizeImage($resourceType, $image_width, $image_height, $resizeWidth, $resizeHeight)
{
    $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
    imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
    return $imageLayer;
}

function checkIfUpload()
{
    if ($_FILES["image"]["error"] !== 4) {
        return true;
    } else {
        return false;
    }
}

function checkForUploadErrors()
{
    $uploadError = null;

    // TODO Snygga till
    // Reject uploaded file larger than 1MB
    // if ($_FILES["image"]["size"] > 1048576) {
    //     return 'File too large (max 1MB)';
    // }

    if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        switch ($_FILES["image"]["error"]) {
            case UPLOAD_ERR_PARTIAL:
                $uploadError = 'File only partially uploaded';
            case UPLOAD_ERR_NO_FILE:
                $uploadError = 'No file was uploaded';
            case UPLOAD_ERR_EXTENSION:
                $uploadError = 'File upload stopped by a PHP extension';
            case UPLOAD_ERR_FORM_SIZE:
                $uploadError = 'File exceeds MAX_FILE_SIZE in the HTML form';
            case UPLOAD_ERR_INI_SIZE:
                $uploadError = 'File exceeds upload_max_filesize in php.ini';
            case UPLOAD_ERR_NO_TMP_DIR:
                $uploadError = 'Temporary folder not found';
            case UPLOAD_ERR_CANT_WRITE:
                $uploadError = 'Failed to write file';
            default:
                $uploadError = 'Unknown upload error';
        }
    }

    return $uploadError;
}
