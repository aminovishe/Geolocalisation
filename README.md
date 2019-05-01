# Geolocalisation
Geolocalisation - Elligy

![Capture](https://user-images.githubusercontent.com/45513715/57042231-077e0080-6c5c-11e9-96fc-4f60702bd6cd.PNG)

### Requirement :
- Having installed IDE (VS Code & PHP extention, PHPstorm)
- Having a server (WampServer)

### Launching project

For launching this project, you should follow the steps bellow :

1 - Clone this project and open it with VS code
2 - Install dependencies in project: >composer install
3 - Configurate DATABASE_URL in .env file ( EX : DATABASE_URL=mysql://user_name:password@127.0.0.1:3306/database_name )
4 - Run the server (WampServer)
5 - Create the DB: >php bin/console doctrine:database:create
6 - Create table (entities) in DB : >php bin/console doctrine:migration:migrate
7 - Initialize table with data: >php bin/console doctrine:fixtures:load
8 - Run application: >php bin/console server:run

## Enjoy
