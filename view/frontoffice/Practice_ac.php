<?php
require '../../config.php';
$q_score = $_POST['quality'];
$feedback_txt = $_POST['suggestion'];
//$conn = mysqli_connect("localhost", "root","", "feedback");
$sql ="INSERT INTO feedback (quality_score,feedback) VALUES ('$q_score','$feedback_txt')";
$db = config::getconnexion();
$req = $db->prepare($sql);
$req->execute();
//$result = mysqli_query($conn, $query);
?>