<?php
require("../includes/config.php");
$src1= $_POST['source1'];
$result = lookup($src1);
echo json_encode($result);
?>