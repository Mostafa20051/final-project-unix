pipeline {
    agent any

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Stop old containers') {
            steps {
                sh '''
                docker compose down || true
                docker ps -q --filter "publish=8085" | xargs -r docker stop
                docker ps -aq --filter "publish=8085" | xargs -r docker rm
                '''
            }
        }

        stage('Deploy') {
            steps {
                sh '''
                docker compose up -d --build
                '''
            }
        }
    }
}
