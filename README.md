# mmimagemap
a remake of the old MW Imagemap TYPO3 extension for newer TYPO3 versions

This extension does not offer new functionalities.
It is just a new implementation of the old MW Imagemap plugin which should work in TYPO3 8.x and 9.x.

If someone wants to migrate data from an installation of the old MW Imagemap to the new MM Imagemap - just follow those steps:

1.) Install MM Imagemap
2.) Immediately after install: open the file <extdir>/mmimagemap/Resources/Php/Migratedata.php
2.) Comment line 15
3.) call <domainname>/typo3conf/ext/mmimagemap/Resources/Php/Migratedata.php
4.) uncomment line 15 again
5.) done :-)
