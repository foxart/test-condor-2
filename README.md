# Project Name

## Description

This project appears to be a PHP application configured to work with a Docker environment and an Apache server.

### Installation

Follow these steps to get your development environment up and running:

1. **Clone the repository:**
    ```bash
    git clone git@github.com:foxart/test-condor-2.git
    ```

2. **Navigate to the project directory:**
    ```bash
    cd your-project-directory
    ```

3. **Set up the environment:**
    - Apache configurations can be adjusted in `apache/sites-available/local.conf`.
    - Use the provided `docker-compose.yml` file to set up Docker containers.

4. **Starting the Application:**
    - **Using Docker:**
      ```bash
      docker-compose up
      ```

### Usage

- Access the main application at `http://localhost`.
- Routes and additional functionality are defined in `RouterConfig.php`.
- Final solution at `http://localhost/solution/total`.
