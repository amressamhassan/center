 <?php 
session_start();
include '../clasess/interface.php';
 include '../clasess/user.php';
 include '../clasess/admin.php';

$log= new  admin;
$log->logout();
  ?>
  
  	<meta http-equiv="Refresh" content="0;URL=index.php" />