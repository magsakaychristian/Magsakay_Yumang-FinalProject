<?php
if (isset($_GET["q"])) {
    $q = $_GET["q"];
    $xml = simplexml_load_file("data.xml");
    $result = $xml->xpath("//data[@id='$q']");

    if ($result) {
        $student = $result[0];
        $id = $student['id'];
        $name = $student->name;
        $course = $student->course;

        echo "<div>
                <span class='result-label'>ID:</span> $id <br>
                <span class='result-label'>Name:</span> $name <br>
                <span class='result-label'>Course:</span> $course <br>
                <div class='btn-group'>
                    <a href='UPDATE.php?id=$id' class='btn-edit'>EDIT RECORD</a>
                    <form action='DELETE.php' method='POST' style='display:inline;' onsubmit='return confirm(\"Delete record #$id?\")'>
                        <input type='hidden' name='id' value='$id'>
                        <button type='submit' name='submit' class='btn-delete'>DELETE RECORD</button>
                    </form>
                </div>
              </div>";
    } else {
        echo "No record found.";
    }
}
?>