<?php include_once 'init.php'; ?>

<?php
$job = new Job;

$template = new Template('templates/frontpage.php');

//shorthand conditional - if there's a category in URL, set variable to this, if not, null
$category = isset($_GET['category']) ? $_GET['category'] : null;

if($category){
    $template->jobs = $job->getByCategory($category);
    $template->title = 'Jobs In '. $job->getCategory($category)->name;
} else {
    $template->title = 'Latest Jobs';

    //gives the template access to the getAllJobs function in Job
    $template->jobs = $job->getAllJobs();
}



$template->categories = $job->getCategories();

echo $template;