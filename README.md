# NXT PHP Client

PHP library to easily call NXT API in your PHP projects 
&& a command line utility to help with node management and command line blockchain queries.

Requirements: PHP5+ for the php library alone
Linux for the command line utiliy

## Instalation

If you have git installed:

```	
mkdir nxt-php-client; 
cd nxt-php-client; 
git clone https://github.com/websioux/nxt-php-client.git
```

else

```
wget https://github.com/websioux/nxt-php-client/archive/master.zip;
unzip nxt-php-client-master.zip; 
mv nxt-php-client-master nxt-php-client
```

## To use with PHP projects

Add `require('/PATH_TO/nxt-php-client/params.php')` to the top of your PHP project

## SET UP Command Line Utility:

* Create custom config

```
cp nxt-php-client/dummy-config.php nxt-php-client/private-config.php
```
and edit private-config.php with your server address.

* Add *nxt* as an alias of /PATH_TO/nxt-php-client/commands/bootstrap

```
echo "alias nxt='/PATH_TO/nxt-php-client/commands/bootstrap'" >>  ~/bash_aliases;
source ./bash_aliases
```

Try:

```
nxt help 
```

FINISHED!

