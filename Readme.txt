Instructions to Run Build Script:

1. To compile and test the script install Jenkins as a build automation tool and configure accordingly to your system.

2. As the script utilizes PHP for executing PHPUnit tests, install php.

3. Place the below shell script in your Jenkins job configuration or execute it directly on your Jenkins server.

4. Ensure that the path to PHP is correct (e.g., `/usr/local/bin/php`), and the PHPUnit test file location is accurate.

5. Execute the shell script using Jenkins or by running it manually in your terminal.

6. The followings Test script performs the listed actions:

    rm -rf $WORKSPACE/devopsproject
    git clone https://github.com/KrishnaMahat/devopsproject.git $WORKSPACE/devopsproject
    cd $WORKSPACE/devopsproject
    /usr/local/bin/php vendor/bin/phpunit tests/unittest.php

- Deletes the 'devopsproject' directory in the Jenkins workspace.
- Clones the latest version of the 'devopsproject' repository from GitHub into the Jenkins workspace.
- Navigates to the 'devopsproject' directory.
- Executes PHPUnit tests located in 'tests/unittest.php'.

7. The folowing build script generate the deployable package in the form of ZIP file.

    rm -rf $WORKSPACE/devopsproject
    rm -rf $WORKSPACE/devopsproject.zip
    git clone https://github.com/KrishnaMahat/devopsproject.git $WORKSPACE/devopsproject
    cd $WORKSPACE
    zip -r devopsproject.zip devopsproject

- Deletes the 'devopsproject' and 'devopsproject.zip' directory in the Jenkins workspace.
- Clones the latest version of the 'devopsproject' repository from GitHub into the Jenkins workspace.
- Navigates to the 'devopsproject' directory.
- Executes command to ZIP the devopsproject folder.

8. Review the Jenkins console output for any errors or warnings during the build process.

9. If PHPUnit tests fail, investigate the failure details in the console output and make necessary adjustments to the code.

10. Once the build is successful, you can further integrate this script into your CI/CD pipeline as needed.
