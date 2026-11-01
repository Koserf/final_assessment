<?php

include "header.php";
include "db.php";

if (isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $matric_number = $_POST['matric_number'];
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $test1 = $_POST['test1'];
    $test2 = $_POST['test2'];
    $final = $_POST['final'];

    $total = $test1 + $test2 + $final;

    if ($total >= 80)
        $grade = 'A';
    else if ($total >= 65)
        $grade = 'B';
    else if ($total >= 50)
        $grade = 'C';
    else if ($total >= 40)
        $grade = 'D';
    else
        $grade = 'E';

    $sql = $conn->prepare("INSERT INTO results2
    (student_name,matric_number,subject_name,subject_code,test1,test2,final,total,grade) VALUES 
    ('$student_name','$matric_number','$subject_name','$subject_code', $test1, $test2, $final,$total,'$grade')");
a
    if ($sql->execute()) {
        header("Location: index.php");
    }

}

?>

<style>
    label {
        display: inline-block;
        width: 15%;
    }
</style>

<h2>ADD RESULT</h2>

<form method="post">
    <label for="">Student Name</label>
    <input type="text" name="student_name"> <br><br>

    <label for="">Matric Number</label>
    <input type="text" name="matric_number"> <br><br>

    <label for="">Subject Name</label>
    <input type="text" name="subject_name"> <br><br>

    <label for="">Student Code</label>
    <input type="text" name="subject_code"> <br><br>

    <label for="">Test 1 (20%)</label>
    <input type="text" name="test1"> <br><br>

    <label for="">Test 2 (30%)</label>
    <input type="text" name="test2"> <br><br>

    <label for="">Final Examination (50%)</label>
    <input type="text" name="final"> <br><br>

    <input type="submit" name="submit" value="Submit">

</form>

<?php

include "footer.php";

?>