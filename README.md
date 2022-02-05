SchtroupfVisor permet de schtroumpfer les avis clients et de pouvoir schtroupfer la base de schtroumpf client pour plusieurs schtroumpf

( PHP 8.03 symfony cli v4.23.5 et windows 11 (tout disfonctionnement du à Linux ou Macosne sera pas pris en charge, merci d'installer windows 11 pour lance ce programme dans les meilleures conditions ))

Voici les étapes à réaliser pour l'install

1-composer install

2-php bin/console d:s:u --force

3-php bin/console d:f:l







les données : ![img.png](img.png)



TODO: 

les routes
Pour générer un token ![img_1.png](img_1.png)
une fois le token récupéré, il est à mettre dans le header des requeêtes:
![img_2.png](img_2.png)
get
     -toutes les reviews d'un site ( en fournissant l'id ) public token Done
   ![img_3.png](img_3.png)
    -la liste des schtroumpf token Done
![img_4.png](img_4.png)
post

    -post une review ( id + contenu ) token Done
![img_5.png](img_5.png)
![img_6.png](img_6.png)
ici on n'as accès à cette route que si on est enregistré dans la base comme ADMIN ou CREATOR ( a voir dans le voter )
	
    -modérer ( donc modifier une review ) token  + role
    -supprimer une review ( donc modifier une review ) token  + role 
	dans cette api , les différents états des commentaires seront traités de la façon suivante 
        status = 1 pas encore accepté
        status = 2 accepté 
        status = 3 supprimé 
    Ces états seront gérés par le client qui consommera les données 
![img_7.png](img_7.png)
    -register un site token + role ( il faut être ADMIN pour le faire ) Done
![img_8.png](img_8.png)
Le service de schtroumpfage des textes Done les textes des reviews sont modifiés pour être schtroumfés

Les Données sont générées grace aux fixtures 
voici les users générés pa les fixtures
![img_9.png](img_9.png)
il faut utiliser les emails dans le champ username de la route login , et le mot de passe est password