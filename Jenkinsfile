pipeline {
  agent any

  stages {
    stage('Checkout') {
      steps { checkout scm }
    }

    stage('Deploy') {
      steps {
        sh '''
          cd "$WORKSPACE"
              docker compose down || true

                 CID=$(docker ps -q --filter "publish=8085") || true
          if [ -n "$CID" ]; then
            echo "Port 8085 is in use by container(s): $CID"
            docker stop $CID || true
            docker rm $CID || true
          fi

          docker compose up -d --build
          docker compose ps
        '''
      }
    }
  }
}
