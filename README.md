# Projet Application de Petites Annonces

## Description du Projet

Le projet consiste à développer une application web permettant aux utilisateurs de publier, consulter et gérer des petites annonces dans diverses catégories telles que l'immobilier, les véhicules, l'emploi, et les services. L'application aura une interface moderne, intuitive, et responsive pour s'adapter à tous les types d'appareils (mobile, tablette, ordinateur). L'objectif est de faciliter les transactions entre particuliers et professionnels tout en offrant des fonctionnalités avancées pour la gestion des annonces.

## Objectifs du Projet

- **Offrir une interface simple et conviviale** : Créer une plateforme facile à utiliser avec un design intuitif.
- **Permettre une interaction fluide entre les annonceurs et les acheteurs** : Faciliter la publication d'annonces et la gestion des interactions.
- **Intégrer des fonctionnalités avancées pour la recherche et la gestion des annonces** : Permettre une recherche rapide et filtrée des annonces.
- **Assurer la sécurité des utilisateurs** : Protéger les informations personnelles et garantir la sécurité des transactions via un hachage des mots de passe.
- **Optimiser la performance** : Garantir une application réactive avec des temps de chargement rapides même avec un grand nombre d'annonces et d'utilisateurs.

## Critères d’acceptation

1. **Inscription et Connexion**
   - L'utilisateur peut s'inscrire avec son adresse email, son mot de passe.
   - L'utilisateur peut se connecter en utilisant ses identifiants.

2. **Gestion du Profil Utilisateur**
   - L'utilisateur peut modifier ses informations personnelles (nom, prénom, email, numéro de téléphone, localisation (ville, département, région, pays)).
   - L'utilisateur peut télécharger et changer sa photo de profil.
   - L'historique des annonces publiées doit être accessible dans le profil.

3. **Création d'Annonces**
   - L'utilisateur peut créer une annonce en remplissant un formulaire avec des champs obligatoires (titre, description, prix, photos, catégorie, localisation).
   - L'annonce est visible après validation et est enregistrée dans la base de données.

4. **Consultation des Annonces**
   - Les annonces doivent être affichées sous forme de liste, avec des filtres par prix, date, catégorie et localisation.
   - Un affichage détaillé doit être disponible pour chaque annonce avec une galerie d'images.

5. **Recherche Avancée**
   - L'utilisateur peut rechercher des annonces par mots-clés les résultats de manière précise.

6. **Interaction Utilisateur**
   - Un système de commentaires et d'avis est disponible pour chaque annonce.
   - L'utilisateur peut sauvegarder ses annonces favorites pour y accéder facilement.

7. **Sécurité**
   - Les mots de passe sont correctement hachés avant d'être enregistrés dans la base de données.
   - Des mesures de sécurité sont prises pour protéger les informations personnelles des utilisateurs.

8. **Performance**
   - Le temps de chargement des pages ne doit pas dépasser 2 secondes.

## User Stories

1. **User Story 1 : Inscription Utilisateur**
   - *En tant qu'utilisateur*, je souhaite m'inscrire sur la plateforme en utilisant mon adresse email, afin de pouvoir publier et gérer mes annonces.
   - **Critères d'acceptation** :
     - L'inscription doit être rapide et sécurisée.
     - Le mot de passe doit faire au moins 12 caractères, avec 1 majuscule, 1 minuscule, 1 chiffre et un caractère spéciale.

2. **User Story 2 : Création d'Annonce**
   - *En tant qu'utilisateur*, je veux pouvoir créer une annonce en remplissant un formulaire simple, afin de proposer mon produit ou service à la vente.
   - **Critères d'acceptation** :
     - Le formulaire inclut des champs obligatoires (titre, description, prix, localisation, image).
     - Une fois l'annonce validée, elle est visible dans les résultats de recherche.

3. **User Story 3 : Recherche Avancée**
   - *En tant qu'utilisateur*, je veux effectuer une recherche avancée d'annonces par mots-clés, afin de trouver précisément ce que je recherche.
   - **Critères d'acceptation** :
     - Un champ de recherche est disponible pour saisir des mots-clés.
     - Les résultats de la recherche doivent être filtrés en temps réel.

## Livrables

1. **Application Web Fonctionnelle et Testée**
   - L'application sera entièrement fonctionnelle et testée pour garantir que toutes les fonctionnalités soient opérationnelles.

2. **Documentation Utilisateur**
   - Un manuel détaillé expliquant comment s'inscrire, créer une annonce et consulter les annonces.

3. **Documentation Technique**
   - Une documentation détaillant l'architecture de l'application, les technologies utilisées, ainsi que les configurations techniques.

4. **Guide pour l’Administration de la Plateforme**
   - Un guide dédié à l'administration de la plateforme pour gérer les utilisateurs, les annonces, les rapports, et les données.

## Contraintes et Risques

1. **Respect des Réglementations Locales**
   - L'application doit se conformer aux règles de confidentialité et de sécurité des données, telles que le RGPD et les lois sur le commerce électronique.

2. **Montée en Charge**
   - Prévoir la capacité de la plateforme à gérer un nombre croissant d'annonces et d'utilisateurs, tout en maintenant des performances optimales.

3. **Sécurité des Données**
   - Assurer une sécurité renforcée pour les données sensibles des utilisateurs, avec des mécanismes de protection robustes contre les attaques (comme les attaques XSS et SQL injection).

4. **Maintenance et Évolutivité**
   - Planifier l'évolution de la plateforme pour intégrer de nouvelles fonctionnalités et faire face à la montée en charge.
