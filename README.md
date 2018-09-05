Steps to reproduce:

git clone https://github.com/konradja100/rabbit.git

composer update

php bin/console rabbit:create --size=1000

php bin/console messenger:consume-messages
