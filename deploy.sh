#!/bin/bash

USERNAME="hosting"
HOST="83.220.175.38"
MODE="all"
PROJECT_DIR="" # FILL THIS


if [[ $1 = "fast" ]];
then
    MODE="fast";
fi

if [[ $MODE = "all" ]]
then
    echo -e '\x1b[32mBuilding static:\x1b[0m'
    yarn run build && yarn run build_admin
fi
echo -e '\x1b[32mPulling changes:\x1b[0m'
ssh $USERNAME@$HOST "cd $PROJECT_DIR && git pull origin master";
echo -e '\x1b[32mClear cache:\x1b[0m'
ssh $USERNAME@$HOST "setopt rm_star_silent && rm -rf $PROJECT_DIR/app/runtime/cache* && rm -rf $PROJECT_DIR/app/runtime/templates_cache/*"
echo -e '\x1b[32mRegenerate autoload:\x1b[0m'
ssh $USERNAME@$HOST "cd $PROJECT_DIR && composer dumpautoload -o";
echo -e '\x1b[32mUpdating database:\x1b[0m'
ssh $USERNAME@$HOST "cd $PROJECT_DIR/www && php index.php Base Db";
echo -e '\x1b[32mCopy static from modules:\x1b[0m'
ssh $USERNAME@$HOST "cd $PROJECT_DIR/www && php index.php Base StaticModules";
if [[ $MODE = "all" ]]
then
    echo -e '\x1b[32mUploading static:\x1b[0m'
    ssh $USERNAME@$HOST "setopt rm_star_silent && rm -rf $PROJECT_DIR/www/static/* $PROJECT_DIR/www/static_admin/*";
    scp -r ./www/static $USERNAME@$HOST:$PROJECT_DIR/www/
    scp -r ./www/static_admin $USERNAME@$HOST:$PROJECT_DIR/www/
fi
echo -e '\x1b[32mAll done! :)\x1b[0m'