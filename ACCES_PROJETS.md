# Accès aux Projets de Développement

## Configuration actuelle avec ports

Votre environnement de développement est maintenant accessible via des ports différents.

### 🚀 Accès depuis Chrome/Windows

**Utilisez localhost (WSL forward automatiquement) :**

- **Laravel Oxmosys :** http://localhost:8080
- **phpMyAdmin :** http://localhost:8081

### 🧪 Pages de test

- **Test Laravel :** http://localhost:8080/test-port.php
- **Test phpMyAdmin :** http://localhost:8081/test-port.php

### 📋 Comment trouver l'IP de WSL

Si l'IP change, dans WSL exécutez :
```bash
hostname -I
```

### 🔧 Configuration des ports

- **Port 8080 :** Projet Laravel (oxmosys)
- **Port 8081 :** phpMyAdmin
- **Port 80 :** Libre pour d'autres projets

### 📝 Ajouter un nouveau projet

Pour créer un nouveau projet sur le port 8082 :

1. **Créer la configuration nginx :**
```bash
sudo nano /etc/nginx/sites-available/mon-nouveau-projet
```

2. **Contenu du fichier :**
```nginx
server {
    listen 8082;
    listen [::]:8082;
    
    server_name _;
    root /var/www/html/mon-nouveau-projet/public;
    
    index index.php index.html index.htm;
    charset utf-8;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
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

3. **Activer le site :**
```bash
sudo ln -s /etc/nginx/sites-available/mon-nouveau-projet /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl reload nginx
```

4. **Accès :** http://192.168.1.12:8082

### 🔒 Connexion MySQL pour phpMyAdmin

- **Serveur :** localhost
- **Utilisateur :** root
- **Mot de passe :** (laisser vide)

### 🛠️ Commandes utiles

```bash
# Vérifier les ports utilisés
sudo netstat -tlnp | grep nginx

# Redémarrer nginx
sudo systemctl restart nginx

# Voir les logs nginx
sudo tail -f /var/log/nginx/error.log

# Tester une configuration nginx
sudo nginx -t
```

### ✅ Avantages de cette méthode

1. **Accessible depuis Windows** - Pas besoin de modifier le fichier hosts
2. **Ports clairs** - Chaque projet a son port dédié
3. **Facile à retenir** - 8080, 8081, 8082, etc.
4. **Isolation** - Chaque projet est isolé sur son port

### 🎯 Récapitulatif des URLs

| Service | URL | Description |
|---------|-----|-------------|
| Laravel Oxmosys | http://192.168.1.12:8080 | Projet principal |
| phpMyAdmin | http://192.168.1.12:8081 | Gestion base de données |
| Nouveau projet | http://192.168.1.12:8082 | À créer |

**Note :** Remplacez `192.168.1.12` par l'IP actuelle de votre WSL si elle change.