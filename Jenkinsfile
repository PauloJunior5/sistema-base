pipeline {
    agent any
    stages {

        stage("Build") {
            // environment {
            //     DB_HOST = "localhost"
            //     DB_DATABASE = "sistema_base"
            //     DB_USERNAME = "paulo"
            //     DB_PASSWORD = 123456
            // }
            steps {
                sh 'git branch -a'
                sh 'git show-branch --current'
                sh 'git push origin HEAD:master'
                sh 'php --version'
                sh 'composer install'
                sh 'composer --version'
                // sh 'cp .env.example .env'
                // sh 'echo DB_HOST=${DB_HOST} >> .env'
                // sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                // sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                // sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                // sh 'php artisan key:generate'
                // sh 'cp .env .env.testing'
                sh 'php artisan migrate'

                echo 'Building the application...'
            }
        }

        stage("Test") {
            
            steps {
                echo 'Testing the application...'

            }
        }

        stage("Deploy") {
            
            steps {
                echo 'Deploying the application...'
            }
        }

    }
}