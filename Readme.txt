# REPO
# Prerequisites
- PHP ^7.4
- The following PHP extensions must be enabled on your local machine
- Apache2 web server
- XAMPP
- MySQL / MariaDB Server
- Git
# Setting up locally
Clone this file to your localhost and save it to you "htdocs" folder inside XAMPP file.
Follow the Instruction below. If problem occurs just pm me.
# Steps:
1. Upload/Import sql file named "repo_db" to your localhost. 
 - File Location: repo/database/repo_db
2. Change all the information inside the "initialize.php"
 - File Location: repo/initialize.php
   - base_url = localhost/repo
   - DB_SERVER = localhost
   - DB_USERNAME = root
   - DB_PASSWORD = ""
   - DB_NAME = "repo_db"
     - (Note: it depends on the local/server, just follow the information provided by your host incase you uploaded it online).
3. Save all the changes.
4. To access the student page goto "http://localhost/repo" or "localhost/repo".
     - (Note: it depends on the local/server, just follow the information provided by your host incase you uploaded it online).
5. To access the admin page goto "http://localhost/repo/admin" or "localhost/repo/admin".
     - (Note: it depends on the local/server, just follow the information provided by your host incase you uploaded it online).
# Credentials/Users Account
## Administrator:
- Superadmin
admin@dhvsu.edu.ph - admin123
- School MIS
mis@dhvsu.edu.ph - mis123
- School DIRRCTOR of Research
dirr@dhvsu.edu.ph - dirr123
- School Vice President for Research
vpret@dhvsu.edu.ph - vpret123
- School Instructor
instructor1@dhvsu.edu.ph - instructor123
## User:
- Student
sharloteisip@gmail.com - shar123


flow

student to create the study
instructor to recommend the study
approved by the dirr(director of research) 
study will be visible to vpret for approval of the study to be published
dirr to publish approved study bythe VPRET



