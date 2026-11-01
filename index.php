<?php

include "db.php";
$sql = $conn->prepare("SELECT * FROM results2");

$sql->execute();

$result = $sql->get_result();

include "header.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Assessment</title>
</head>

<body>

    <h2>Student Records</h2>

    <a href="">Add Result</a>

    <input type="text" placeholder="Search by name or id">
    <button>Search</button>
    <a href="">Show all</a>

    <div>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Student Name</th>
                <th>Matric No.</th>
                <th>Subject</th>
                <th>Test 1 (20%)</th>
                <th>Test 2 (30%)</th>
                <th>Final (50%)</th>
                <th>Total (100%)</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>

            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['matric_number'] . "</td>";
                echo "<td>" . $row['subject_name'] . "<br>(" . $row['subject_code'] . ")" . "</td>";
                echo "<td>" . $row['test1'] . "</td>";
                echo "<td>" . $row['test2'] . "</td>";
                echo "<td>" . $row['final'] . "</td>";
                echo "<td>" . $row['total'] . "</td>";
                echo "<td>" . $row['grade'] . "</td>";

                echo "<td>";
                echo "<input style= 'margin: 5px;' type='submit' name='edit' value='Edit'>";
                echo "<input style= 'margin: 5px;' type='submit' name='delete' value='Delete'>";
                echo "</td>";

                echo "</tr>";
            }
            ?>

        </table>
    </div>

</body>

</html>