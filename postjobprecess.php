<?php
include 'inc/header.php';
include 'config.php';
// the following variables are used to store the values from the job post form
$position_id = isset($_POST['position_id']) ? strtoupper($_POST['position_id']) : '';
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$closing_date = isset($_POST['closing_date']) ? $_POST['closing_date'] : '';
$position = isset($_POST['position']) ? $_POST['position'] : '';
$contract = isset($_POST['contract']) ? $_POST['contract'] : '';
$application_by = isset($_POST['application_by']) ? $_POST['application_by'] : [];
$location = isset($_POST['location']) ? $_POST['location'] : '';
// an empty array to store the errors
$err = [];
// check if the position id already exists
// check duplicate position id
if(file_exists($file_path)){
    $file = fopen($file_path, 'r');
    while(!feof($file)){
        $line = fgets($file);
        $line = explode("\t", $line);
        if($line[0] == $position_id){
            $err[] = 'Position ID already exists! Please try another one.';
            break;
        }
    }
    fclose($file);
}
// validate the form data
if($position_id == ''){
    $err[] = 'Position ID is required';
}
if(!preg_match('/^PID\d{4}$/', $position_id)){
    $err[] = 'Position ID must be start with PID and followed by 4 digits';
}
if($title == ''){
    $err[] = 'Title is required';
}
if(!preg_match('/^[a-zA-Z0-9\s\,\.\!]{1,20}$/', $title)){
    $err[] = 'Title can only contain a maximum of 20 alphanumeric characters including spaces, comma, full stop, and exclamation point.';
}
if($description == ''){
    $err[] = 'Description is required';
}
if(strlen($description) > 250){
    $err[] = 'Description can only contain a maximum of 250 characters.';
}
if($closing_date == ''){
    $err[] = 'Closing Date is required';
}else{
    $closing_date = date('d/m/Y', strtotime($closing_date));
}
if(!preg_match('/^\d{1,2}\/\d{1,2}\/\d{2,4}$/', $closing_date)){
    $err[] = 'Closing Date must be dd/mm/yyyy or dd/mm/yy';
}
if($position == ''){
    $err[] = 'Position is required';
}
if($contract == ''){
    $err[] = 'Contract is required';
}
if(count($application_by) == 0){
    $err[] = 'Application By is required';
}
if($location == '' || $location == '---'){
    $err[] = 'Location is required';
}

if (count($err) == 0){
    // create the directory if it doesn't exist.
    if(!is_dir($file_dir_path)){
        mkdir($file_dir_path);
    }
    $file = fopen($file_path, 'a');
    fwrite($file, "$position_id\t$title\t$description\t$closing_date\t$position\t$contract\t" . implode('|', $application_by) . "\t$location\n");
    fclose($file);
}

?>
<div class="container">
    <div class="card">
        <?php if(count($err) > 0): ?>
            <div class="alert-danger">
                <p>The following <?php echo count($err) == 1 ? 'error was' : 'errors were'; ?> found. Please correct them and try again.</p>
                <ul>
                    <?php foreach ($err as $e): ?>
                        <li><?php echo $e; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else: ?>
            <div class="alert-success">
                <p>The following job has been successfully posted.</p>
                <table>
                    <tr>
                        <td>Position ID</td>
                        <td>:</td>
                        <td><?php echo $position_id; ?></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>:</td>
                        <td><?php echo $title; ?></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td><?php echo $description; ?></td>
                    </tr>
                    <tr>
                        <td>Closing Date</td>
                        <td>:</td>
                        <td><?php echo $closing_date; ?></td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>:</td>
                        <td><?php echo $position; ?></td>
                    </tr>
                    <tr>
                        <td>Contract</td>
                        <td>:</td>
                        <td><?php echo $contract; ?></td>
                    </tr>
                    <tr>
                        <td>Application By</td>
                        <td>:</td>
                        <td><?php echo implode(', ', $application_by); ?></td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>:</td>
                        <td><?php echo $location; ?></td>
                    </tr>
                </table>
            </div>
        <?php endif; ?>
        <div class="center">
            <a href="index.php" class="btn">Return to Home Page</a>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
