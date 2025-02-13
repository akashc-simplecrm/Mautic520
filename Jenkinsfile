pipeline {
    agent any  // Use any available Jenkins agent

    environment {
        GITHUB_TOKEN = credentials('github-token')  // Fetch token from Jenkins credentials
    }

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', 
                    credentialsId: 'github-token', 
                    url: 'https://github.com/YOUR_USERNAME/YOUR_REPOSITORY.git'
            }
        }

        stage('Build') {
            steps {
                echo "Building the project..."
                // Add build steps (e.g., Maven, npm, etc.)
            }
        }

        stage('Test') {
            steps {
                echo "Running tests..."
                // Add testing commands
            }
        }

        stage('Deploy') {
            steps {
                echo "Deploying application..."
                // Add deployment commands
            }
        }
    }
}
