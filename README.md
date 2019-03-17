# refrence-database
Convert an existing Millennium local/reference database to a MySQL database with PHP editing capabilities and searches.
This program is offered as is. Rodman Public Library will not be held responsible for any damages to your data or system by using this program.

This website has multiple directories. They are organized like so:

```
The root folder (/newAllianceIndex/) contains three subdirectories, and 33 files.
	Subdirectory (/newAllianceIndex/addtionsLogon/) Contains three subdirectories, and 12 files.
		Subdirectory(/newAllianceIndex/addtionsLogon/includes/) This directory includes our logo file, a connection file to connect to the database, a styles file that styles the heading (partially), and a search file that determines the search results for.... nothing. This file is not used, but please keep that file as we need to have it for reference purposes.
			File connect.inc.php DO NOT MAKE CHANGES TO THIS FILE. THIS FILE CONTAINS THE MEANS TO CONNECT TO THE LOGIN DATABASE. If the database credentials are updated, change the four variables that are aptly named above the comment that says DONT TOUCH BELOW thIS LINE.
		Subdirectory(/newAllianceIndex/addtionsLogon/confirm/) This directory contains files that displays a file that allows the additions to be confirmed when the database is being added or edited. These files are extremely important. These files also allow the person adding and editing to submit the files.
		Subdirectory(/newAllianceIndex/addtionsLogon/assets/) This directory contains the bootstrap, css, fonts, img, and javascript directories. These help with the styling of the webpages. These were created in Bootstrap Studio, so if they look a little wonky, thats why. If you do need to make changes, we suggest that you open the .bss file that is located in the root directory and make the changes in Bootstrap Studio.
		File connect.inc.php DO NOT MAKE CHANGES TO THIS FILE. THIS FILE CONTAINS THE MEANS TO CONNECt TO THE LOGIN DATABASE. If the database credentials are updated, change the four variables that are aptly named above the comment that says DONT TOUCH BELOW thIS LINE.
		The rest of the files are used to select data from the database. These files can be modified to change the look and results set if something goes haywire. None of these files are needed for functionality of the database, but they are important for reference department to add and edit the database.
	Subdirectory (/newAllianceIndex/assets/) This directory contains the bootstrap, css, fonts, img, and javascript directories. These help with the styling of the webpages. These were created in Bootstrap Studio, so if they look a little wonky, thats why. If you do need to make changes, we suggest that you open the .bss file that is located in the root directory and make the changes in Bootstrap Studio.
	Subdirectory (/newAllianceIndex/includes/) This directory includes the logo file, a connection file to connect to the database, a styles file that styles the heading (partially), and a search file that determines the search results for.... nothing. This file is not used, but please keep that file as we need to have it for reference purposes.
		Files footer.inc.php and header.inc.php These files are ones that can be changed to change the look of the header or footer for the primary portion of the website.
```
