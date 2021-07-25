# Deploy
If you want to use this code and deploy it through Github Actions, please make sure you configure the parts relevant to your use case.

* `REMOTE_HOST` - SSH hostname of the server that will run the Nginx with PHP
* `REMOTE_USER` - SSH username to log in to REMOTE_HOST
* `SSH_PRIVATE_KEY` - SSH private key relevant to REMOTE_USER
* `REMOTE_TARGET` - Target directory to put the code in on REMOTE_HOST

# Nginx
```nginx configuration
server {
    server_name volleyball.mixup.nl volleybal.mixup.nl;
    listen 443 ssl; # managed by Certbot
    root /var/www/volleyball.mixup.nl;
    index index.php index.html;

    location = /favicon.ico {
        log_not_found off;
        access_log off;
    }

    location = /robots.txt {
        allow all;
        log_not_found off;
        access_log off;
    }

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.0-fpm.sock;
        include fastcgi_params;
        fastcgi_intercept_errors on;
        fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~* \.(js|css|png|jpg|jpeg|gif|ico)$ {
        expires max;
        log_not_found off;
    }

    error_log /var/log/nginx/volleyball.mixup.nl_error.log;
    access_log /var/log/nginx/volleyball.mixup.nl_access.log;

    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/volleyball.mixup.nl/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/volleyball.mixup.nl/privkey.pem; # managed by Certbot

}

server {
    listen 80;
    server_name volleyball.mixup.nl volleybal.mixup.nl;

    if ($host = volleyball.mixup.nl) {
        return 301 https://$host$request_uri;
    } # managed by Certbot

    if ($host = volleybal.mixup.nl) {
        return 301 https://$host$request_uri;
    } # managed by Certbot
 
    return 404; # managed by Certbot
}
```
