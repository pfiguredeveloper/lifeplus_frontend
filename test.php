<?php 
phpinfo();
$old = umask(0);
chmod("/opt/bitnami/apache/htdocs/lifeplus_api/public", 0777);
umask($old);

// Checking
if ($old != umask()) {
    die('An error occurred while changing back the umask');
}
?>