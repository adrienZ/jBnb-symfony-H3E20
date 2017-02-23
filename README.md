# symfony-H3T2-E20

Jbnb

### Team composition

- Théo Kunetz-- [@Crazyphapha](https://github.com/Crazyphapha)
- Louis Rialland -- [@LouisRialland](https://github.com/LouisRialland)
- Max Allouch  -- [@maxaloc](https://github.com/maxaloc)
- Ulysse Tallepied  -- [@ulysset](https://github.com/ulysset)
- Adrien Zaganelli -- [@adrienZ](https://github.com/adrienZ)

### Exigences techniques

- [x] Symfony 3.2+
- [x] PSR-2
- [x] GitHub privé
- [ ] Tests unitaires PHPUnit  https://symfony.com/doc/current/testing.html
- [x] Documentation détaillée (PhpDoc et ApiDoc)

### Exigences fonctionnelles

- [ ] Offrir des services novateurs
- [x] Stocker et restituer des données saisies par les utilisateurs
- [x] Back office de gestion du site
- [ ] Dashboard d'indicateurs dans le back office

### Installation

You need to install node.js and gulp

```
$ composer install
$ php bin/console doctrine:database:create
$ php bin/console doctrine:database:import sql-exports/jBNb.sql
$ php bin/console doctrine:schema:update --force
$ cd web
$ npm install
$ gulp sass
$ cd ../
$ sf server:run
```
