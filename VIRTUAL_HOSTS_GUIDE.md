# Guide Configuration Virtual Hosts Nginx

## Table des matières
1. [Prérequis](#prérequis)
2. [Structure des fichiers](#structure-des-fichiers)
3. [Créer un nouveau virtual host](#créer-un-nouveau-virtual-host)
4. [Configurations Nginx types](#configurations-nginx-types)
5. [Gestion des domaines locaux](#gestion-des-domaines-locaux)
6. [Commandes utiles](#commandes-utiles)
7. [Dépannage](#dépannage)

## Prérequis

- Nginx installé et fonctionnel
- PHP-FPM configuré
- Accès sudo pour la configuration

## Structure des fichiers

```
/etc/nginx/
├── sites-available/        # Configurations disponibles
│   ├── default
│   ├── oxmosys.test
│   └── nouveau-projet.test
├── sites-enabled/          # Configurations actives (liens symboliques)
│   └── oxmosys.test -> ../sites-available/oxmosys.test
└── nginx.conf              # Configuration principale
```

## Créer un nouveau virtual host

### Étape 1: Créer le fichier de configuration

```bash
sudo nano /etc/nginx/sites-available/mon-projet.test
```

### Étape 2: Configuration de base Laravel/PHP

```nginx
server {
    listen 80;
    listen [::]:80;
    
    server_name mon-projet.test;
    root /var/www/html/mon-projet/public;
    
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    
    index index.php index.html index.htm;
    charset utf-8;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
    
    error_page 404 /index.php;
    
    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
    
    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### Étape 3: Ajouter le domaine au fichier hosts

```bash
sudo nano /etc/hosts
```

Ajouter la ligne :
```
127.0.0.1    mon-projet.test
```

### Étape 4: Activer le virtual host

```bash
# Créer le lien symbolique
sudo ln -s /etc/nginx/sites-available/mon-projet.test /etc/nginx/sites-enabled/

# Tester la configuration
sudo nginx -t

# Recharger nginx
sudo systemctl reload nginx
```

## Configurations Nginx types

### 1. Site Laravel/PHP (avec PHP-FPM)

```nginx
server {
    listen 80;
    server_name laravel-app.test;
    root /var/www/html/laravel-app/public;
    index index.php;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 2. Site HTML statique

```nginx
server {
    listen 80;
    server_name static-site.test;
    root /var/www/html/static-site;
    index index.html index.htm;
    
    location / {
        try_files $uri $uri/ =404;
    }
}
```

### 3. Application Node.js (Proxy reverse)

```nginx
server {
    listen 80;
    server_name nodejs-app.test;
    
    location / {
        proxy_pass http://localhost:3000;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
    }
}
```

### 4. API REST (avec restrictions)

```nginx
server {
    listen 80;
    server_name api.test;
    root /var/www/html/api/public;
    index index.php;
    
    # CORS Headers
    add_header 'Access-Control-Allow-Origin' '*' always;
    add_header 'Access-Control-Allow-Methods' 'GET, POST, PUT, DELETE, OPTIONS' always;
    add_header 'Access-Control-Allow-Headers' 'Accept, Authorization, Content-Type' always;
    
    location / {
        if ($request_method = 'OPTIONS') {
            return 204;
        }
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 5. phpMyAdmin

```nginx
server {
    listen 80;
    server_name pma.test;
    root /var/www/html/phpmyadmin;
    index index.php;
    
    location / {
        try_files $uri $uri/ =404;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
    
    location ~ /\.ht {
        deny all;
    }
}
```

## Gestion des domaines locaux

### Fichier /etc/hosts

```bash
# Domaines de développement local
127.0.0.1    oxmosys.test
127.0.0.1    mon-projet.test
127.0.0.1    api.test
127.0.0.1    pma.test
127.0.0.1    static-site.test
```

### Script d'automatisation (optionnel)

Créer un script pour automatiser la création :

```bash
#!/bin/bash
# create-vhost.sh

if [ $# -eq 0 ]; then
    echo "Usage: $0 <nom-du-projet>"
    exit 1
fi

PROJECT_NAME=$1
DOMAIN="${PROJECT_NAME}.test"
WEBROOT="/var/www/html/${PROJECT_NAME}/public"

# Créer la configuration nginx
sudo tee /etc/nginx/sites-available/${DOMAIN} > /dev/null <<EOF
server {
    listen 80;
    listen [::]:80;
    
    server_name ${DOMAIN};
    root ${WEBROOT};
    
    index index.php index.html index.htm;
    charset utf-8;
    
    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        include fastcgi_params;
    }
}
EOF

# Activer le site
sudo ln -s /etc/nginx/sites-available/${DOMAIN} /etc/nginx/sites-enabled/

# Ajouter au fichier hosts
echo "127.0.0.1    ${DOMAIN}" | sudo tee -a /etc/hosts

# Tester et recharger nginx
sudo nginx -t && sudo systemctl reload nginx

echo "Virtual host ${DOMAIN} créé avec succès !"
echo "Accessible à : http://${DOMAIN}"
```

## Commandes utiles

```bash
# Lister les sites disponibles
ls -la /etc/nginx/sites-available/

# Lister les sites actifs
ls -la /etc/nginx/sites-enabled/

# Tester la configuration nginx
sudo nginx -t

# Recharger nginx (sans interruption)
sudo systemctl reload nginx

# Redémarrer nginx
sudo systemctl restart nginx

# Voir les logs d'erreur
sudo tail -f /var/log/nginx/error.log

# Voir les logs d'accès
sudo tail -f /var/log/nginx/access.log

# Désactiver un site
sudo unlink /etc/nginx/sites-enabled/nom-du-site.test

# Activer un site
sudo ln -s /etc/nginx/sites-available/nom-du-site.test /etc/nginx/sites-enabled/
```

## Dépannage

### Problème : "Site inaccessible"
1. Vérifier que le domaine est dans /etc/hosts
2. Vérifier que le lien symbolique existe dans sites-enabled
3. Tester la configuration nginx : `sudo nginx -t`

### Problème : "403 Forbidden"
1. Vérifier les permissions du dossier web
2. Vérifier que l'utilisateur nginx peut accéder au dossier
```bash
sudo chown -R www-data:www-data /var/www/html/mon-projet
sudo chmod -R 755 /var/www/html/mon-projet
```

### Problème : "404 Not Found" pour les routes
1. Vérifier la directive `try_files`
2. S'assurer que le fichier index.php existe
3. Vérifier les logs : `sudo tail -f /var/log/nginx/error.log`

### Problème : PHP ne s'exécute pas
1. Vérifier que PHP-FPM fonctionne : `sudo systemctl status php8.3-fpm`
2. Vérifier le chemin du socket : `ls -la /run/php/`
3. Tester avec un fichier phpinfo()

## Sécurité

### Recommandations
- Toujours utiliser `.test` pour le développement local
- Ne jamais exposer les sites de développement sur internet
- Utiliser des mots de passe forts pour phpMyAdmin
- Restreindre l'accès à certains dossiers

### Configuration SSL (optionnel pour le développement)
```nginx
server {
    listen 443 ssl;
    server_name mon-projet.test;
    
    ssl_certificate /path/to/certificate.crt;
    ssl_certificate_key /path/to/private.key;
    
    # Reste de la configuration...
}
```

---

**Note :** Ce guide est optimisé pour un environnement de développement local. Pour la production, des configurations de sécurité supplémentaires sont nécessaires.