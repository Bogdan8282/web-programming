<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Page Scraper</title>
</head>
<body>

<?php

include "WebPageScraper.php";

// Використання класу для отримання та обробки сторінки
$url = 'https://college.ks.ua';
$scraper = new WebPageScraper($url);
$scraper->loadPage();

$class = 'shedule_content'; 
$tagName = 'div'; 
$parentClass = 'form-190'; // Specify the parent class

$elements = $scraper->findElementsByClass($class, $tagName, $parentClass);

echo $scraper->getDOM()->saveHTML($elements[0]) . "\n";

?>

</body>
</html>
