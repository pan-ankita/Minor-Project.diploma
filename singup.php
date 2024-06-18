<?php
$insert = false;
if(isset($_POST['name'])){
	// Set connection variables
	$server = "localhost";
	$username = "root";
	$pssword = "";
	
	// Create a DB connection
	$con = mysqli_connect($server, $username);
    // $password);
	
	// Check for connection success
	if (!$con){
		die("Connection to this DB failed due to ". mysqli_connect_error());
	}
	// echo "Success connecting to the DB.";
	
	// Collect post variables
	$name = $_POST['name'];
	$sem = $_POST['sem'];
	$regnum = $_POST['regnum'];
	$dept = $_POST['dept'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `college`.`student` (`name`, `sem`, `regnum`, `dept`, `phone`, `email`, `time`) VALUES ('$name', '$sem', '$regnum', '$dept', '$phone', '$email', current_timestamp());";

	// Executing the DB
	if($con->query($sql) == true){
        // echo "Successfully inserted";
		$insert = true; 
        // (2:19:00 watch)
	}
	else{
        echo "ERROR: $sql <br> $con->error";
    }

	// Closing the connection
	$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign up</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background: linear-gradient(to right,#1b4769,#97bcd7, #cadbe7 ); /* Blue gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Set the height of the viewport */
            margin: 0;
        }

        .Signup-container {
            background-color: #f0f7ff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.911);
            width: 450px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            width: 430px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #007bff;
        }

        .form-group input::placeholder {
            color: #aaa;
        }

        .form-group input[type="submit"] {
            background-color: #0056b3;
            /* linear gradient( to right, #1ca7ec,#1f2f98); */
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #89baee;
        }

        .styled-select select{
            width: 450px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Animation */
        .form-group input {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="Signup-container">
        <h2>Student Sign up</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <!-- <input type="text" id="semester" name="semester" placeholder="Enter your semester" required> -->
                <div class="styled-select">
                    <select id="semester" name="sem">
                        <option value="dept">Select your Semester</option>
                        <option value="1">1st Sem</option>
                        <option value="2">2nd Sem</option>
                        <option value="3">3rd Sem</option>
                        <option value="4">4th Sem</option>
                        <option value="5">5th Sem</option>
                        <option value="6">6th Sem</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="regNumber">Registration Number</label>
                <input type="text" id="regNumber" name="regnum" placeholder="Enter your registration number"
                    required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                    <div class="styled-select">
                        <select id="department" name="dept">
                            <option value="dept">Select your department</option>
                            <option value="CST">Computer Science & Technology</option>
                            <option value="ETCE">Electronics & Telecommunications</option>
                            <option value="EE">Electrical Engineering</option>
                            <option value="ME">Mechanical Engineering</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Sign Up">
            </div>
        </form>
    </div>
</body>

</html>