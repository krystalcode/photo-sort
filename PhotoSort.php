<?php

// Rename files starting from SAM_0001.JPG.
// Change this to match your naming requirement.
$prefix    = 'SAM_';
$extension = '.JPG';
$number    = 1;

// Get list of files in the given folder.
// Defaults to the folder that the script is located.
// Change this to folder that holds the images, if different.
$folder = dirname(__FILE__) . '/';
$files  = scandir($folder);

// Remove from the $files array files that are not images.
$files = array_filter($files, 'isImage');

// Sort files by timestamp.
usort($files, 'compareByTimestamp');

// Rename files.
foreach ($files as $file) {
    rename(
        $folder.$file,
        $folder.$prefix.str_pad($number, 4, '0', STR_PAD_LEFT).$extension
    );
    ++$number;
}

// Checks if a file is an image simply by checking it's extension.
function isImage($file) {
    return in_array(pathinfo($file, PATHINFO_EXTENSION), array('jpg', 'JPG'));
}

// Compare files using the timestamp provide by the image's exif data.
function compareByTimestamp($a, $b)
{
    $folder = '/data/';
    $aTimestamp = exif_read_data($folder.$a)['FileDateTime'];
    $bTimestamp = exif_read_data($folder.$b)['FileDateTime'];

    if (!isset($aTimestamp)) {
        die('DateTime not defined for image file '.$a);
    }

    if (!isset($bTimestamp)) {
        die('DateTime not defined for image file '.$b);
    }

    if ($aTimestamp === $bTimestamp) {
        return 0;
    }

    if ($aTimestamp < $bTimestamp) {
        return -1;
    } else {
        return 1;
    }
}
