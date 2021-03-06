<?php

include_once 'Sample_Header.php';

use PhpOffice\PhpProject\PHPProject;
use PhpOffice\PhpProject\IOFactory;
    
// Create new PHPProject object
echo date('H:i:s') . ' Create new PHPProject object'.EOL;
$objReader = IOFactory::createReader('GanttProject');
$objPHPProject = $objReader->load(__DIR__ . DIRECTORY_SEPARATOR);

// Set properties
echo date('H:i:s') . ' Get properties'.EOL;
echo 'Creator > '.$objPHPProject->getProperties()->getCreator().EOL;
echo 'LastModifiedBy > '.$objPHPProject->getProperties()->getLastModifiedBy().EOL;
echo 'Title > '.$objPHPProject->getProperties()->getTitle().EOL;
echo 'Subject > '.$objPHPProject->getProperties()->getSubject().EOL;
echo 'Description > '.$objPHPProject->getProperties()->getDescription().EOL;
echo EOL;

// Add some data
echo date('H:i:s') . ' Get some data'.EOL;
echo 'StartDate > '.$objPHPProject->getInformations()->getStartDate().EOL;
echo 'EndDate > '.$objPHPProject->getInformations()->getEndDate().EOL;
echo EOL;

// Ressources
echo date('H:i:s') . ' Get ressources'.EOL;
foreach ($objPHPProject->getAllResources() as $oResource){
    echo 'Resource : '.$oResource->getTitle().EOL;
}
echo EOL;

// Tasks
echo date('H:i:s') . ' Get tasks'.EOL;
foreach ($objPHPProject->getAllTasks() as $oTask){
	echoTask($objPHPProject, $oTask);
}

// Echo done
echo date('H:i:s') . ' Done reading file.'.EOL;

if (!CLI) {
    include_once 'Sample_Footer.php';
}