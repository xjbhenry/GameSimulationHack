<?php
include("../db/newdbconn.php");

if(isset($_POST['name-field'])) {
    $name_field = $_POST['name-field'];
    echo $name_field;
}
if(isset($_POST['people-field'])) {
    $people_field = $_POST['people-field'];
    echo $people_field;
}
if(isset($_POST['start-field'])) {
    $start_field = $_POST['start-field'];
    echo $start_field;
}
if(isset($_POST['end-field'])) {
    $end_field = $_POST['end-field'];
    echo $end_field;
}
if(isset($_POST['step-field'])) {
    $step_field = $_POST['step-field'];
    echo $step_field;
}

echo $_POST['decision-name-field0'];
echo $_POST['decision-type-field0'];

$decision_num;
if(isset($_POST['decision-num'])) {
    $decision_num  = $_POST['decision-num'];
    echo $decision_num;
}

$decision_name_field = array();
$decision_type_field = array();
for ($i = 1; $i < $decision_num + 1; $i++) {
    $dnf = "decision-name-field" . $i;
    echo $dnf;
    array_push($decision_name_field, $_POST[$dnf]);
    $dtf = "decision-type-field" . $i;
    array_push($decision_type_field, $_POST[$dtf]);
}

$variable_num;
if(isset($_POST['variable-num'])) {
    $variable_num  = $_POST['variable-num'];
}
echo $variable_num;

$variable_name_field = array();
$variable_equation_field = array();
for ($i = 1; $i < $variable_num + 1; $i++) {
    $dnf = "variable-name-field" . $i;
    array_push($variable_name_field, $_POST[$dnf]);
    $dtf = "variable-equation-field" . $i;
    array_push($variable_equation_field, $_POST[$dtf]);
}

echo $variable_equation_field[0];
foreach ($variable_name_field as $vnf) {
    print($vnf);
}




?>