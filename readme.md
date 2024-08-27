# Livre d'or JS
Amélioration du projet livre d'or realiser en PHP avec l'ajout du Javascript


## Docker

Pour construire et démarrer le projet, exécutez :

```sh
docker-compose up --build
```

### Réalisation de tests

## Test Unitaire

Pour réaliser les différents tests sur la partie back-end en PHP, nous utiliserons la bibliothèque PHPUnit qui s'installe via Composer. Les différents tests doivent être rédigés dans le dossier `tests`.

Pour exécuter les tests, utilisez la commande suivante :

```
./vendor/bin/phpunit tests 
```

Si le projet est utilisé avec Docker, il faut exécuter toutes les commandes `PHPUnit` à l'intérieur du conteneur `web`, comme suit :

```
docker compose exec web ./vendor/bin/phpunit tests/TestUser.php
```