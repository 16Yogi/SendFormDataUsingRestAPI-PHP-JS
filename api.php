<?php
    // $con = mysqli_connect("localhost","root","","db1");
    // if($con){
    //     echo "Connected";
    // }else{
    //     echo "failed";
    // }

    // if($_SERVER["REQUEST_METHOD"]=="POST"){
    //     $json = file_get_contents('php://input');
    //     $data = json_decode($json,true);

    //     $fname = $data['fname'];
    //     $lname = $data['lname'];

    //     $insert = "INSERT INTO form1(fname,lname) VALUES('$fname','$lname')";
    //     $rel = mysqli_query($con,$insert);
    //     if($rel){
    //         $responseArray = ['message'=>'inserted'];
    //         echo json_encode($responseArray);
    //     }else{
    //         $responseArray = ['message'=>'not inserted'];
    //         echo json_encode($responseArray);
    //     }
    // }





 
    // Establish database connection
    $con = mysqli_connect("localhost", "root", "", "db1");
    
    if(!$con) {
        // Handle connection error
        echo json_encode(["message" => "Connection failed: " . mysqli_connect_error()]);
        exit;
    }

    // Check if POST request is made
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get raw POST data
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // Check if data was successfully decoded
        if ($data && isset($data['fname']) && isset($data['lname'])) {
            $fname = mysqli_real_escape_string($con, $data['fname']);
            $lname = mysqli_real_escape_string($con, $data['lname']);

            // Use prepared statement to avoid SQL injection
            $stmt = $con->prepare("INSERT INTO form1 (fname, lname) VALUES (?, ?)");
            $stmt->bind_param("ss", $fname, $lname);  // "ss" means both are strings
            
            if ($stmt->execute()) {
                echo json_encode(['message' => 'Inserted']);
            } else {
                echo json_encode(['message' => 'Not inserted']);
            }

            $stmt->close(); // Close the prepared statement
        } else {
            echo json_encode(['message' => 'Invalid data']);
        }
    }

    mysqli_close($con);  // Close the database connection
?>