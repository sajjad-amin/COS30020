<?php
// the config file contains the path to the jobs.txt file so that it can be used in other files and if the path changes, it only needs to be changed in one place
$file_dir_path = 'jobposts';
// check the $file_dir_path directory contains the / or \ (in case of windows) at the end of the path
// the constant DIRECTORY_SEPARATOR is used to get the correct slash for the operating system
if(substr($file_dir_path, -1) != DIRECTORY_SEPARATOR){
    $file_dir_path .= DIRECTORY_SEPARATOR;
}
$file_path = $file_dir_path.'jobs.txt';
