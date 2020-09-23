# portfolioSymfony
symfony documentation
composer create-project symfony/website-skeleton nom du projet 
composer require server --dev
cd nom du projet
php -S 127.0.0.1:8000  -t public    ////ouvrire le serveur local
php bin/console make:controller  //// crée un controller + fichier yaml pour views
php bin/console doctrine:database:create creation de base de donner + modification DATABASE_URL= dans le fichier .env
php bin/console make:entity creation d'une classe avec les seter et geter pour gerer la table 
php bin/console make:migration sincroniser entre la classe crée et les table dans mysql 
php bin/console doctrine:migrations:migrate lancer la migration 
si la migration ne fonctionne pas on doit la forcer avec:
    php bin/console doctrine:schema:update --dump-sql
    php bin/console doctrine:schema:update --force 
        Mais il ne crée pas de nouvelle version de migration et ne laisse donc pas d'archives.
ou on change  .env   ::: DATABASE_URL=mysql://root:@127.0.0.1:3306/portfoliosymfony?serverVersion=mariadb-10.4.11
