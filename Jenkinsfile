pipeline {
  agent any

  stages {
    stage('Checkout') {
      steps {
        checkout scm
      }
    }

    stage('Deploy') {
      steps {
        sh '''
          set -e
          cd "$WORKSPACE"

          echo "== Stop this project containers =="
          docker compose down || true

          echo "== Free port 8085 if used by any container =="
          CID=$(docker ps -q --filter "publish=8085" || true)
          if [ -n "$CID" ]; then
            echo "Port 8085 is in use by container(s): $CID"
            docker stop $CID || true
            docker rm $CID || true
          fi

          echo "== Deploy =="
          docker compose up -d --build
          docker compose ps
        '''
      }
    }
  }
}