<ol>

<?php

	echo "<li>apt-get update</li>";
	echo "<li>apt-get install apache2</li>";
	echo "<li>apt-get install mysql-server</li>";
	echo "<li>apt-get install php5</li>";
	echo "<li>apt-get install php5-mysql</li>";
	echo "<li>a2enmod php5</li>";
	echo "<li>nano /etc/php5/apache2/php.ini</li>";
	echo "<small>( added extension=mysql.so )</small>"
	echo "<li>echo 'echo php_info();' > /var/www/index.php</li>";

?>

</ol>
