<?php

session_start();
$_SESSION['LI_USERNAME'] = null;
$_SESSION['LI_USER_TYPE'] = null;
echo '<script type="text/javascript">self.location="index.htm";</script>";';
?>