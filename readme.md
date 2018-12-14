# Project 4
+ By: *Sandra Anderson*
+ Production URL: <http://p4.dcyc.club>

## Database

Primary tables:
  + `users`
  + `runs`
  + `challenges`
  
Pivot table(s):
  + `challenge_user`


## CRUD
To see the CRUD operations, you will need to log-in.
Once logged in all CRUD operations can be performed using the 'Track' functionality

__Create__
  + Default 'Track view' <http://p4.dcyc.club/tracker> will allow you to add a run
  + Enter Run information, and submit the form
  + You should be directed to the 'View Runs' page with the new run added
  
__Read__
  + Track > View Runs will let you view all of the logged in Users Runs
  + <http://p4.dcyc.club/viewruns>
  
__Update__
  + From Track > View Runs, select a run to delete and click the Delete Link
  + <http://p4.dcyc.club/viewruns>
  + Edit Run information, and submit the form
  + You should be directed to the 'View Runs' page with the new run edited
  
__Delete__
  + From Track > View Runs, select a run to edit and click the Edit Link
  + <http://p4.dcyc.club/viewruns>
  + Click 'Delete Run' Button
  + You should be directed to the 'View Runs' page with the new run deleted

## Pivot Tables
  + Pivot Table functionality can be found under Challenges

## Outside resources
+ <https://stackoverflow.com/questions/32475892/reflectionexception-class-classname-does-not-exist-laravel>
 for reference on an issue with a class not found
+ Background image in Nav bar from https://www.pexels.com
+  The following for general reference: http://php.net/, https://laravel.com/, https://www.w3schools.com/
## Code style divergences
N/A

## Notes for instructor
N/A

