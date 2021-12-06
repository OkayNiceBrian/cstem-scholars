<?php

require_once '../../init.php';

$c = new ModelController(Application::class);
$application = $c->model();

$selectedPeriodID = HTTP::get('periodID', Period::mostRecent()->id ?? null);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="applications.csv"');

$list[0] = array('Name', 'Email', 'Title', 'Major', 'GPA', 'Graduation Date', 'Advisor', 'Advisor Email', 'Description', 'Timeline', 
'Justification', 'Total Budget', 'Requested Budget', 'Funding Sources', 'Student ID', 'Period ID', 'Status', 'Budget Table', 'Amount Awarded', 'Date Submitted', 'Date Approved');
$list[1] = array($application->name, $application->email, $application->title, $application->major,
    $application->gpa, $application->graduationDate, $application->advisorName, $application->advisorEmail,
    $application->description, $application->timeline, $application->justification, $application->totalBudget,
    $application->requestedBudget, $application->fundingSources, $application->studentID, $application->periodID,
    $application->status, $application->budgetTable, $application->amountAwarded, $application->dateSubmitted, $application->dateApproved); 

$fp = fopen('php://output', 'wb');
foreach ($list as $line) {
    fputcsv($fp, $line, ',');
}
fclose($fp);