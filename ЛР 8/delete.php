<?php
if (isset($_GET['id'])){
    $id = (int)$_GET['id'];

    $xml = simplexml_load_file('book.xml');

    unset($xml->book[$id]);

    $xml->asXML('book.xml');

    header('Location: view.php');
    exit;
}
?>
