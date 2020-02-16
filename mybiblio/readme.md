# Procédure d'installation de l'application My Biblio 
## Prérequis  
- un serveur local
- installer PHP 7.3
## Création de la structure  
1. utilisation de la commande : ```composer create-project symfony/website-skeleton mybiblio "4.3" ```
2. création de la base de données :
    - dans le dossier env. on nomme la base de données
    - dans le terminal :```bin/console doctrine:database:create```  
La structure est en place
## Migration des entités
1. utilisation de la commande : ```bin/console make:entity```
    création de 3 entités :  
        Lecteur avec comme information:  
        - nom  
        - prénom  
        - adresse  
        Genre avec comme information :
        - nom  
        Livre avec comme information : 
        - titre  
        - date de prêt  
        - date de retour  
2. Création du fichier migration : ```bin/console make:migration```  
3. Exécution de la migration ```bin/console doctrine:migrations:migrate``` 
4. Exécution de la commande CRUD ```bin/console make:crud``` 
5. Création des fixtures : ```bin/console doctrine:fixtures:load``` pour l'entité genre 





