## Running the application:

1. Change to the project directory
2. Start the database by running `docker-compose -p pizza up -d`
3. Run the following commands to create the database and load some sample data
    - `php bin/console doctrine:migrations:migrate -n`
    - `php bin/console doctrine:fixtures:load -n`
3. Execute `php bin/console server:start` to start the internal webserver
4. Browse to http://localhost:8000/ 


## Stopping the application
1. `docker-compose -p pizza down -v` will stop the container and remove the database volume
2. Execute `php bin/console server:stop` to kill the webserver.

## Choices I made:
I chose to run with an model / entity first design based on symfony4 and php 7.2 thereby forcing a clean structure with
controllers, repositories and services.

One of the requirements was to allow for easy switching of order storage method, this was done by defining an interface 
for the OrderRepository. Using symfony's container it's easy to pick another service that implements this interface, 
to see how this is done check the following files:
- config/services.yaml
- src/Repository/OrderStorageInterface.php
- src/Repository/DatabaseOrderRepository.php
- src/Repository/FileStorageOrderRepository.php


For notifying the user after updating the orderstatus an eventsubscriber was created. Again using the symfony container 
a list of classes implementing the StatusUpdateNotificationInterface is injected into the OrderSavedSubscriber. Each 
service contains a method telling the subscriber if this notifier should be called. 
This is a combination of the observer and strategy patterns, which allows for loosely coupled notifications. 
The OrderService doesn't need to know anything about any kind of notifications and each NotificationService is as 
clean as can be.