<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

$template = new Template('templates/job-single.php');

//shorthand conditional - if there's a category in URL, set variable to this, if not, null
$job_id = isset($_GET['id']) ? $_GET['id'] : null;


$template->job = $job->getJob($job_id);

echo $template;