<?php
include 'config.php';
// getting the queries from the url and trim before usage so that it can't make any problem while searching
// strtolower is used to make the search case insensitive
$title = trim(strtolower($_GET['title']));
$position = trim(strtolower($_GET['position']));
$contract = trim(strtolower($_GET['contract']));
$location = trim(strtolower($_GET['location']));
$jobs = [];
$err = [];
// checking file exists or not and if exists then open the file
// checking file will prevent the program from crashing if the file is not found
if(file_exists($file_path)){
    $file = fopen($file_path, 'r');
    if(empty($title)){
        $err[] = "Title is required.";
    }else{
        while(!feof($file)){
            $line = fgets($file);
            $job = explode("\t", $line);
            $job_title = trim(strtolower($job[1]));
            $job_position = trim(strtolower($job[4]));
            $job_contract = trim(strtolower($job[5]));
            $job_location = trim(strtolower($job[7]));
            if(preg_match("/$title/", $job_title)){
                if($job_position == "" && $job_contract == "" && $job_location == ""){
                    $jobs[] = $job;
                }else if(preg_match("/$position/", $job_position)) {
                    if ($job_contract == "" && $job_location == "") {
                        $jobs[] = $job;
                    } else if (preg_match("/$contract/", $job_contract)) {
                        if ($job_location == "") {
                            $jobs[] = $job;
                        } else if (preg_match("/$location/", $job_location)) {
                            $jobs[] = $job;
                        }
                    }
                }
            }
        }
        if(count($jobs) <= 0){
            $err[] = "Job title not matched.";
        }
        usort($jobs, function($a, $b){
            $a = strtotime($a[3]);
            $b = strtotime($b[3]);
            return $a - $b;
        });
        fclose($file);
    }
}

?>
<?php include 'inc/header.php'; ?>
<div class="container">
    <?php if(count($jobs) == 0): ?>
        <div class="card">
            <div class="alert-danger">
                <p>The following <?php echo count($err) == 1 ? 'error was' : 'errors were'; ?> found. Please correct them and try again.</p>
                <ul>
                    <?php foreach($err as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="center">
                <a href="index.php" class="btn">Return to Home Page</a>
                <a href="searchjobform.php" class="btn">Return to Job Search Page</a>
            </div>
        </div>
    <?php else: ?>
    <?php foreach($jobs as $job): ?>
        <div class="card">
            <table>
                <tr>
                    <td>Job Title</td>
                    <td>:</td>
                    <td><?php echo $job[1]; ?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td><?php echo $job[2]; ?></td>
                </tr>
                <tr>
                    <td>Closing Date</td>
                    <td>:</td>
                    <td><?php echo $job[3]; ?></td>
                </tr>
                <tr>
                    <td>Position</td>
                    <td>:</td>
                    <td><?php echo $job[4]; ?></td>
                </tr>
                <tr>
                    <td>Contract</td>
                    <td>:</td>
                    <td><?php echo $job[5]; ?></td>
                </tr>
                <tr>
                    <td>Application By</td>
                    <td>:</td>
                    <td><?php echo implode(', ', explode('|', $job[6])); ?></td>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>
    <div class="center">
        <a href="index.php" class="btn">Return to Home Page</a>
        <a href="searchjobform.php" class="btn">Return to Job Search Page</a>
    </div>
    <br>
    <br>
    <?php endif; ?>
<?php include 'inc/footer.php'; ?>