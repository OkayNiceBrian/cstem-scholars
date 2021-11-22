<?php

require_once '../../init.php';

User::authorize('advisor');

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="applications.csv"');

$periodID = Period::mostRecent()->id ?? null;
$applications = Application::all('periodID = ? AND status = "submitted"', $periodID);

$i = 0;
$list[0] = array('Name', 'Email', 'Title', 'Major', 'GPA', 'Graduation Date', 'Advisor', 'Advisor Email', 'Description', 'Timeline', 
'Justification', 'Total Budget', 'Requested Budget', 'Funding Sources', 'Student ID', 'Period ID', 'Status', 'Budget Table', 'Amount Awarded', 'Date Submitted'); 
while($i < count($applications)){
    $list[$i+1] = array($applications[$i]->name, $applications[$i]->email, $applications[$i]->title, $applications[$i]->major,
    $applications[$i]->gpa, $applications[$i]->graduationDate, $applications[$i]->advisorName, $applications[$i]->advisorEmail,
    $applications[$i]->description, $applications[$i]->timeline, $applications[$i]->justification, $applications[$i]->totalBudget,
    $applications[$i]->requestedBudget, $applications[$i]->fundingSources, $applications[$i]->studentID, $applications[$i]->periodID,
    $applications[$i]->status, $applications[$i]->budgetTable, $applications[$i]->amountAwarded, $applications[$i]->dateSubmitted);
    $i++;
}

$fp = fopen('php://output', 'wb');
foreach ($list as $line) {
    fputcsv($fp, $line, ',');
}
fclose($fp);