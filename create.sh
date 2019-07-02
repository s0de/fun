#!/bin/bash

USERNAME="hosting"
HOST="83.220.175.38"
PROJECT_NAME="" # FILL THIS
PROJECT_DIR="/var/www/$PROJECT_NAME"
CONF_APACHE_NAME="$PROJECT_NAME.conf"
SERVER_NAME="" # THIS
PROJECT_NAME_GITLAB="" # AND THIS

#############


echo -en "\x1b[36mСоздаю папку $PROJECT_DIR:\x1b[0m"
ssh -t -t $USERNAME@$HOST "cd /var/www/ && sudo mkdir $PROJECT_DIR";

echo -en "\x1b[36mМеняю права доступа:\x1b[0m"
ssh -t -t $USERNAME@$HOST "cd /var/www/ && sudo chown hosting:hosting $PROJECT_DIR";

echo -en "\x1b[36mКлонирую репозиторий:\x1b[0m"
ssh -t $USERNAME@$HOST "cd $PROJECT_DIR && git clone git@gitlab.rclass.pro:rclass/$PROJECT_NAME_GITLAB.git .";

echo -en "\x1b[36mУстанавливаю composer:\x1b[0m"
ssh -t $USERNAME@$HOST "cd $PROJECT_DIR && curl -sS https://getcomposer.org/installer -o composer-setup.php && php composer-setup.php";

echo -en "\x1b[36mУстанавливаю пакеты:\x1b[0m"
ssh -t $USERNAME@$HOST "cd $PROJECT_DIR && php composer.phar install && cd $PROJECT_DIR/www && mkdir static_modules && php index.php Base StaticModules";

#############

echo -en "\x1b[36mСоздаю конфиг apache:\x1b[0m"
ssh -t $USERNAME@$HOST "cd /etc/apache2/sites-available/ && {
echo '
<VirtualHost *:8080>
  ServerName $SERVER_NAME
  ServerAlias www.$SERVER_NAME
  DocumentRoot $PROJECT_DIR/www
  <ifmodule mpm_itk_module>
        AssignUserID hosting hosting
  </ifmodule>
  <Directory $PROJECT_DIR/www>
    AllowOverride All
  </Directory>
</VirtualHost>
' | sudo tee $CONF_APACHE_NAME
}";

echo -en "\x1b[36mВывод конфига:\x1b[0m"
ssh -t $USERNAME@$HOST "cd /etc/apache2/sites-available/ && cat $CONF_APACHE_NAME"

echo -en "\x1b[36mПрокидываю ссылки:\x1b[0m"
ssh -t $USERNAME@$HOST "cd /etc/apache2/sites-enabled && sudo ln -s ../sites-available/$CONF_APACHE_NAME ./$CONF_APACHE_NAME"

echo -en "\x1b[36mТестируем apache:\x1b[0m"
ssh -t $USERNAME@$HOST "sudo apache2ctl configtest"

###############

echo -en "\x1b[36mСоздаю конфиг nginx:\x1b[0m"
ssh -t $USERNAME@$HOST "cd /etc/nginx/sites-available && {
echo '
server {
        server_name $SERVER_NAME;
        access_log /var/log/nginx/access.log;
        location / {
                proxy_pass http://$SERVER_NAME:8080/;
                proxy_set_header Host \$host;
                proxy_set_header X-Real-IP \$remote_addr;
                proxy_set_header X-Forwarded-For \$remote_addr;
                proxy_connect_timeout 120;
                proxy_send_timeout 120;
                proxy_read_timeout 180;
        }
        location ~* \.(jpg|jpeg|gif|png|ico|css|bmp|swf|js|woff)$ {
                root $PROJECT_DIR/www;
                expires max;
                etag on;
        }
}' | sudo tee $PROJECT_NAME
}";

echo -en "\x1b[36mМеняю права доступа конфига:\x1b[0m"
ssh -t $USERNAME@$HOST "cd /etc/nginx/sites-available/ && sudo chown hosting:hosting $PROJECT_NAME && chmod 755 $PROJECT_NAME";

echo -en "\x1b[36mВывод конфига:\x1b[0m"
ssh -t $USERNAME@$HOST "cd /etc/nginx/sites-available/ && cat $PROJECT_NAME"

echo -en "\x1b[36mПрокидываю ссылки:\x1b[0m"
ssh -t $USERNAME@$HOST "cd /etc/nginx/sites-enabled && sudo ln -s ../sites-available/$PROJECT_NAME ./$PROJECT_NAME"

echo -en "\x1b[36mТестирую nginx:\x1b[0m"
ssh -t $USERNAME@$HOST "sudo service nginx configtest"

###############

echo -en "\x1b[36mРедактируем файл hosts:\x1b[0m"
ssh -t $USERNAME@$HOST "cd /etc/ && {echo '83.220.175.38   $SERVER_NAME    www.$SERVER_NAME' | sudo tee -a hosts;}";

echo -en "\x1b[36mВывод хостов:\x1b[0m"
ssh -t $USERNAME@$HOST "cd /etc/ && cat hosts"

