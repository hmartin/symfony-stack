## Symfony quick starter for POC

Four commands to have a full symfony stack (front/back), configured with all "classics" running on docker image.<br><br>
**Included:**<br>
Symfony 5.1<br>
Doctrine (with migrations, fixtures...)<br>
Easyadmin (secure with login form)<br>
Bootstrap (yarn)<br>

## First installation
```
docker-composer up
# In new terminal with the good docker image name (depend on your directory: "docker ps" to see it)
docker exec *_php bash
composer install
composer init-stack
```
Go to: http://127.0.0.1:8088/


The command "init-stack" do the following action:
```
php bin/console d:m:m --no-interaction
php bin/console doctrine:fixtures:load --no-interaction
yarn install
yarn encore dev
```
