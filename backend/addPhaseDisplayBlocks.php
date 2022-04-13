<?php
//get both stimFiles for each block to display blocks that can be added to new phase.

//open connection to database
$conn = new mysqli("us-cdbr-east-05.cleardb.net:3306", "b5541841c18a2e", "ee93a776", "heroku_8eb08016ed835ac");

//retrieve all created blocks
$stmt = "SELECT * FROM block_T";
$stims = $conn->query($stmt);
if(mysqli_num_rows($stims) > 0){
    while($row = $stims->fetch_assoc()) {
        //echo each block's stimFiles so we can have display for admin
        //to select and add blocks to phases.
        echo $row["blockID"];
        echo "<br>";
        $stmt2 = "SELECT stimFile FROM stimuli_T WHERE stimID = " . $row["stimIDOne"];
        $stimFile1 = $conn->query($stmt2);
        echo $stimFile1 . "<br>";
        $stmt2 = "SELECT stimFile FROM stimuli_T WHERE stimID = " . $row["stimIDTwo"];
        $stimFile2 = $conn->query($stmt2);
        echo $stimFile2 . "<br>" . "<br>";
    }
}
else{
    echo "No blocks in database"; //if (no results), we need to go add blocks to database
} 

//close connection
$conn->close();

?>
