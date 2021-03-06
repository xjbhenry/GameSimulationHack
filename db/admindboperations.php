<?php
session_start();
include('dbconnection.php');


// Creating a new Simulation into already existing SIMULATION_TABLES

function addSim($sim_id, $sim_pass, $sim_name)
{
	echo "add Sim ";
	$conn = connect();
	$sql = "INSERT INTO [simulation_table] (User_ID,Sim_ID,Sim_Password,Sim_Name) VALUES (?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$user_id = $_COOKIE['email'];
	//$user_id = $_SESSION("email");
	echo "user_id ". $user_id;
	$stmt->bindValue(1, $user_id);
	$stmt->bindValue(2, $sim_id);
	$stmt->bindValue(3, $sim_pass);
	$stmt->bindValue(4, $sim_name); 	 	
    try {
        $stmt->execute();
    } catch(PDOException $e) {
        print( "Error " );
        die(print_r($e));
    }
        unset($conn);
}

// Creating the Model table corresponding Add Simulation
/*function createModelTable($sim_table, $sim_pass) {
	$conn = connect();
	$sql = "CREATE TABLE SIMULATIONS ( USER_ID varchar(50) ,PASSWORD varchar(50) NOT NULL";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $name);
	$stmt->bindValue(2, $category);
	$stmt->bindValue(3, $date);
	$stmt->bindValue(4, $is_complete);
	$stmt->execute();
}*/

// Initializing the model table created into existing SIM_MODEL_TABLE

function initializeModelTable($sim_id,$start_time, $end_time, $initial_steps) {
	$conn = connect();
	echo "initializeModelTable";
	$sql = "INSERT INTO [sim_model_table] (SIM_ID,START_TIME,END_TIME,INITIAL_STEPS) VALUES (?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $sim_id);
	$stmt->bindValue(2, $start_time);
	$stmt->bindValue(3, $end_time);
	$stmt->bindValue(4, $initial_steps);
    try {
        $stmt->execute();
    } catch(PDOException $e) {
        print( "Error " );
        die(print_r($e));
    }
        unset($conn);
}


//function for initializing decision table
function initializeDecisionTable($sim_id,$decision_vars,$types) {
	$conn = connect();
	echo "initializeDecisionTable";
	createDecisionTable($sim_id);
	
	for($i = 0; $i < count($decision_vars); $i++) {
	    $sql = "INSERT INTO [decision".$sim_id."] (D_NAME,D_TYPE) VALUES(?,?)";
	    $stmt = $conn->prepare($sql);
	    $stmt->bindValue(1, $decision_vars[$i]);
	    $stmt->bindValue(2, $types[$i]);
	}
	// foreach ($types as $key => $value) {
	// 	# code...
	// }
	try {
        $stmt->execute();
    } catch(PDOException $e) {
        print( "Error " );
        die(print_r($e));
    }
        unset($conn);
}


//function for initializing variables values
function initializeVariableTable($sim_id,$variable_vars,$equations) {
	$conn = connect();
	echo "initializeVariableTable";
	createVariableTable($sim_id);
	for($i = 0; $i < count($variable_vars); $i++) {
	    $sql = "INSERT INTO [variable" . $sim_id . "] (V_NAME,V_EQUATION) VALUES(?,?)";
	    $stmt = $conn->prepare($sql);
	    $stmt->bindValue(1, $variable_vars[$i]);
	    $stmt->bindValue(2, $equations[$i]);
	}
	// foreach ($types as $key => $value) {
	// 	# code...
	// }
	try {
        $stmt->execute();
    } catch(PDOException $e) {
        print( "Error " );
        die(print_r($e));
    }
        unset($conn);
}

function createDecisionTable($sim_id) {
	echo "createDecisionTable";
	$conn = connect();
	$sql = "CREATE TABLE [decision".$sim_id."] (D_NAME varchar(255),D_TYPE int)";
    $stmt = $conn->prepare($sql);	
    try {
        $stmt->execute();
    } catch(PDOException $e) {
        print( "Error " );
        die(print_r($e));
    }
        unset($conn);
}

function createVariableTable($sim_id) {
	echo "createVariableTable";
	$conn = connect();
	$sql = "CREATE TABLE [variable" . $sim_id ."] (V_NAME varchar(255),V_EQUATION varchar(255))";
    $stmt = $conn->prepare($sql);	
    try {
        $stmt->execute();
    } catch(PDOException $e) {
        print( "Error " );
        die(print_r($e));
    }
        unset($conn);
}



// Creating the Decision Table corresponding Simulation

// $sim_name = $_POST["sim_name"];
// $sim_id = substr($sim_name,0,4).rand(1000,10000);
// $sim_password = $_POST["sim_password"];
// addSim($sim_id, $sim_password,$sim_name);
// $start_time = $_POST["start_time"];
// $end_time = $_POST["end_time"];
// $initial_steps = $_POST["initial_steps"];
// initializeModelTable($start_time, $end_time, $initial_steps);

?>