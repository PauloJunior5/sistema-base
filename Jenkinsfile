pipeline {
    agent any
    stages {

        stage("Build") {

            steps {
                echo 'Building the application...'
            }

        }

        stage("Test") {

            steps {
                echo 'Testing the application...'

            }
        }

        stage("Deploy") {

            // steps {
            //     echo 'Deploying the application...'
            //     script {
            //         if (env.BRANCH_NAME == 'master') {
            //             echo 'I only execute on the master branch'
            //         } else {
            //             echo 'I execute elsewhere'
            //         }
            //     }
            // }
        }

    }
}