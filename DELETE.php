<?php
if (isset($_POST['submit'])) {
    $idToDelete = $_POST['id'];
    $xml = simplexml_load_file("data.xml");

    foreach ($xml->data as $student) {
        if ((string)$student['id'] === $idToDelete) {
            $dom = dom_import_simplexml($student);
            $dom->parentNode->removeChild($dom);
            break;
        }
    }

    $xml->asXML("data.xml");
    echo "<script>alert('Record #$idToDelete deleted.'); window.location.href='Search.php';</script>";
}
?>