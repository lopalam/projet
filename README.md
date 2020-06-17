# Docto-Covid-Allo

[toc]

## Présentation

### Description
Docto-Covid-Allo est une plateforme qui permet de mettre en relation les patients atteint du COVID-19 avec des médecins de diverses spécialisations. Cette maladie apportant beaucoup de complication, il est primordial d'avoir acces à des soins adaptés. 

### Fonctionnement

![](https://image.noelshack.com/fichiers/2020/25/3/1592347681-drawio.png)



### Base de données

![](https://i.imgur.com/ZnzMW91.png)

## Installation

### Prérequis

- [XAMPP](https://www.apachefriends.org/index.html)
- La base de données téléchargeable [ici](https://drive.google.com/file/d/1kqo_8kQHkUkhxAv29yKWJE508t7wgben/view?usp=sharing)
- l'ensemble des fichiers constituant le site et qui permettent sa navigation disponible [ici](https://github.com/lopalam/projet)
- [NodeJS](https://nodejs.org/en/)
- Du courage

### Processus d'installation:

1. **Installer XAMPP**
    , puis dans XAMPP installé Apache ainsi que MySQL (si les bouttons sont grisés il vous suffit de 
    lancer XAMPP en tant qu'administrateur / ``sudo``).
    ![](https://i.imgur.com/4y4NiHv.png)

2. **Configurer les Ports des services**
    Aller dans: `Config`(en haut a droite)>`Service and Port Settings`>`Apache` changer le port pour ``8080``. ![](https://i.imgur.com/2LwBnj4.png)
    
3. **Configurer le dossier `htdocs`**
    Les Fichiers téchargés contenant les pages doivent etre décompressés et
    déposé dans ``C:\xampp\htdocs`` (*Windows*) ou ``/opt/lampp/apache2/htdocs`` (*Linux*).
    
    
## Utilisation
### Lancer le site

1. Tout d'abord lancer XAMPP, puis cliquer sur les cases `Start`  à droite de **Apache** et **MySQL**
2. Puis, lancer son navigateur favori, aller dans la barre d'URL, puis taper `http://localhost:8080/project`
3. Enfin, pour lancer le chat, on lance un terminal puis on se rend à la racine du projet et dans le dossier `chat` puis on tape la commande `npm install` et on tape la commande `npm start index.js`

&nbsp;

## Fonctionnalités
