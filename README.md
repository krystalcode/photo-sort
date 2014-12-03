# Photo Sort #

A simple php script that sorts (renames) image/photo files in a folder based on their creation dates.

## What is this repository for? ##

This script was originally written when I had to recover some deleted photos from a hard disk. After the recovery the photos had random file names such as f842354824.jpg and had lost their original names given by the camera e.g. SAM_0144.JPG. I wanted to bring the original names back so that I can browse the photos in a chronological order.

It can be used in a similar scenario or in any case where you would like to name image/photo files in a way that reflects by their creation date.

## How do I get set up? ##

### Quick Start ###
Copy the script into the folder that contains the image/photo files to be sorted and execute it.

```
php PhotoSort.php
```

### Configuration Options ###

By default the script will loop through all image/photo files in the folder within which the script is located and it will name the files starting with SAM_0001.JPG and counting upwards.

* You can change the directory that contains the files by changing the $folder variable (absolute path required).
* You can configure the file prefix by changing the $prefix variable.
* You can configure the extension by changing the $extension variable.
* You can configure the starting number by changing the $number variable.

## Current Behaviour / Limitations ##

* The script requires that all image/photo files contain information about their creation date and time. Technically it requires that all files have valid Exif Data with a valid DateTime property.
* The script will not run recursively and will not process files within sub-folders.
* There is currently no option to keep part of the original file names.
* It detects only files with .jpg or .JPG extension. It may be easily made to work with other file formats but it hasn't been tested yet.

## Contribution guidelines ##

* If you would like to see a feature added to the script, open an issue.
* If you would like to contribute code to the script, open a pull request.

## Who do I talk to? ##

@krystalcode
