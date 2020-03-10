# ECDBpersonal

This is a personal version of ECDB by Pete Willard

A personal edition of the ECDB tool which I have running on a local Raspberry Pi with an attached  WD PiDrive.  The changes to the original code are related to updating the SQL code to cope with the later versions of MYSQL that deprecated many functions.  The user interface changes are related to it being a personal edition and making use of FontAwesome and Jquery components.

This version also allows for uploading of PDF datasheets, PDF Application Notes and Parts Images.  These are all stored as files and not *in* the database.  To make working with files that reside in folders, jquery autocomplete has been employed to locate files even when only part of the name is entered, though it remains case sensitive.

## Documentation

Currently there is no detailed documentation available. 

## Installation

- Download this git.
- Create a MySQL database.
- Import `ecdb.sql` database structure to your MySQL-database.
- You will need to create a database user ECDB with a PASSWORD and grant all Priv's.  Easiest done with PHPmyadmin

----
mysql -u root -p
CREATE USER 'ecdb'@'%' IDENTIFIED BY 'user_password';
GRANT ALL PRIVILEGES ON ecdb.* TO 'ecdb'@'localhost';
exit
----

- Insert your MySQL credential data in the configuration file, `include/login/config.php`.
- **You are now set to go!** The default username is `demo` and password `demo`.
- Use the interface to create your own username and password, as needed.

### Requirements

- Apache2.4.10 or newer Web Server
- PHP Version 5.6.3 or newer
- Updated for use with MySQL Version 5.5.57 or newer



## License

This is free and unencumbered software released into the public domain.  

Note that the original author released as Creative Commons but placed restrictions on public use. This is a release intended for non-public use.



## Original License

- ecDB is licensed under a Creative Commons [Attribution-NonCommercial-ShareAlike 3.0 Unported License](http://creativecommons.org/licenses/by-nc-sa/3.0/).
- The ecDB code is not allowed for public use, other than on [www.ecDB.net](http://www.ecdb.net/).
- You are allowed to set up a private ecDB database for yourself, or whithin an organisation.

