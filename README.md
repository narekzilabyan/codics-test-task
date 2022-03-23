# Users Laravel/Elasticsearch (Test project)
### Step 1: Use docker for local deployment
!!! If you don't have docker and docker-compose, you can install it from the official site https://docs.docker.com/get-docker/

#### Run project
```bash
    ./vendor/bin/sail up
```

### Step 2: Run script for create/indexing test data
```bash
    ./scripts/up.sh
```

!!! Checking the availability of the application
http://localhost/users
