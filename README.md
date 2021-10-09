Pour lancer le site, installer d'abord la database en exécutant le script `airaustral.sql` qui est dans le dossier sql.  
Puis installer le dossier AirAustral-Apple sous votre serveur.  
Lancer la page `page_accueil.php`
Vous pouvez à présent rechercher des vols.
Quelques vols sont déjà enregistrés.
Par exemple vous pouvez recherchez selon ces critères:

Lieu de départ : Charles De Gaule
Lieu d'arrivée : Rolland Garos
Date de Départ : 06/02/2020

Pour vous connectez, des clients sont déjà enregistrés. Regardez la table 'personne' pour avoir des exemples.
Vous pouvez vous connectez avec le client:
Login : a
Mot de passe : a.
pour tester.


Chaque avion à un nombre de places limité. Les places sont numérotées et sont associées à une classe.
Lorsque vous reservez pour un certain nombre de personnes, toutes pour une classe donnée, le système vérifie la disponibilité de votre
commande. Elle est satisfaite s'il y a suffisamment de places dans la classe recherchée, auquel cas, vous êtes amenés à choisir un des vols puis vous allez à la page de paiement.
Sinon, le système vous avertit qu'il n y a pas suffisamment de places et vous invite à réitérer votre demande avec d'autres critères.

