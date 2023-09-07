<?php
function getCurrentPage(){
    $currentPage = $_SERVER['PHP_SELF'];
    $currentPage = explode('/', $currentPage);
    $currentPage = end($currentPage);
    return $currentPage;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Advanced Web Development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Md Radif Rafayet Chowdhury" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php
        switch (getCurrentPage()){
            case 'index.php':
                echo 'Home';
                break;
            case 'postjobform.php':
                echo 'Post Job';
                break;
            case 'searchjobform.php':
                echo 'Search Job';
                break;
            case 'about.php':
                echo 'About this Project';
                break;
            default:
                echo 'Job Vacancy Posting System';
        }
        ?>
    </title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="main-nav">
    <h1 class="brand"><a href="index.php">Job Vacancy Posting System</a></h1>
    <ul>
        <li class="<?php echo getCurrentPage() == 'index.php' ? 'active-nav' : ''; ?>"><a href="index.php">Home</a></li>
        <li class="<?php echo getCurrentPage() == 'postjobform.php' ? 'active-nav' : ''; ?>"><a href="postjobform.php">Post Job</a></li>
        <li class="<?php echo getCurrentPage() == 'searchjobform.php' ? 'active-nav' : ''; ?>"><a href="searchjobform.php">Search Job</a></li>
        <li class="<?php echo getCurrentPage() == 'about.php' ? 'active-nav' : ''; ?>"><a href="about.php">About</a></li>
    </ul>
</nav>