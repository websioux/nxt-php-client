<?php
/* ADVICE: SAVE THIS FILE as private-config.php and modify the values there. 
 * This way if there is an update, your config will not be erase with dummy values
 * 
*/
define('SERVER_PATH','~/nxt/'); // local path to the nxt server install if it exist (required for server management queries)
define('NODE','http://localhost:7876'); // default NXT node location given in HTTP or SSH format example; http://host:7876 or https://host:7876 or ssh://user@host (ssh can be used if this lib is also installed on the node)
define('EXTERNAL_NXT_PHP_LIB','/home/lib/nxt-php-client'); // OPTIONAL, distant location of this library on the distant node will be used for request done via ssh
define('ADMIN_EMAIL','you@domain.com'); // OPTIONAL - allow admin email alert for some cases.
