pipeline {
  agent any
  stages {
    stage('Clone Repository') {
      steps {
        git(branch: 'main', credentialsId: 'github-token', url: 'https://github.com/YOUR_USERNAME/YOUR_REPOSITORY.git')
      }
    }

    stage('Build') {
      steps {
        echo 'Building the project...'
      }
    }

    stage('Test') {
      steps {
        echo 'Running tests...'
      }
    }

    stage('Deploy') {
      steps {
        echo 'Deploying application...'
      }
    }

  }
  environment {
    GITHUB_TOKEN = credentials('github-token')
  }
}