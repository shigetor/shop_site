Для развертывания проекта
$ composer install
$ composer update
Настроить local.nginx 
server {
    server_name shop1.my;
    root /home/monstrata/OC/shop_site/public;

    location / {
        # try to serve file directly, fallback to index.php
        try_files $uri /index.php$is_args$args;
    }

    # optionally disable falling back to PHP script for the asset directories;
    # nginx will return a 404 error when files are not found instead of passing the
    # request to Symfony (improves performance but Symfony's 404 page is not displayed)
    # location /bundles {
    #     try_files $uri =404;
    # }

    location ~ ^/index\.php(/|$) {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        internal;
    }


    location ~ \.php$ {
        return 404;
    }

    error_log /var/log/nginx/om_error.log;
    access_log /var/log/nginx/om_access.log;
}
Настроить символическую ссылку для nginx
Создать .end.local 
DATABASE_URL="mysql://root:@localhost/shop?serverVersion=8.0&charset=utf8"
Установить nodejs
$npm install
$sudo apt install nodejs npm 
