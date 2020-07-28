# mmimagemap TYPO3 10
a remake of the old MW Imagemap TYPO3 extension for newer TYPO3 versions

This extension does neither offer new functionalities nor a new user interface.
It is just a new implementation of the old MW Imagemap plugin which should now work in TYPO3 10.x

# Migration (via script file)
If someone wants to migrate data from an installation of the old MW Imagemap to the new MM Imagemap - just follow those steps:

1.) Install MM Imagemap. It is presumed that your TYPO3 database must also contain all tables (with data) from the old version.

2.) Immediately after install: Copy the file [extdir]/mmimagemap/Resources/Private/Php/Migratedata.php to [extdir]/mmimagemap/Migratedata.php
  
3.) open the file [extdir]/mmimagemap/Migratedata.php for editing.

4.) Comment line 15.

5.) call [domainname]/typo3conf/ext/mmimagemap/Migratedata.php in your browser.
  
6.) delete file [extdir]/mmimagemap/Migratedata.php

7.) done :-)


# Migration (via CLI command)

1.) After install run this command in your pages root folder on command line:
```
vendor/bin/typo3 imagemap:migratemwimagemap
```

For further details about running cli commands see documentation:
https://docs.typo3.org/m/typo3/reference-coreapi/master/en-us/ApiOverview/CommandControllers/Index.html#running-the-command-from-the-command-line

2.) (!) Depending on the number of image maps in your system migration might take a while.