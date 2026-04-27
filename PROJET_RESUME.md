# 🏥 Projet Cabinet Médical - Résumé Complet

Le projet est entièrement développé dans le dossier `cabinet`. Voici la liste exhaustive des fonctionnalités et composants implémentés.

## 🛠️ Architecture des Données
- **Migrations** :
  - `users` : Augmentée avec les champs `role` (admin, doctor, patient) et `phone`.
  - `services` : Table des prestations médicales (`name`, `description`, `price`, `duration`).
  - `appointments` : Table pivot reliant patients, médecins et services avec gestion des dates et notes.
- **Seeders & Factories** : Génération de 10 utilisateurs et 20 rendez-vous pour une démo immédiate.

## 🔐 Authentification & Layouts
- **Laravel Breeze** : Système de connexion et d'inscription complet.
- **Sidebar Layout** : Structure avec barre latérale pour la gestion administrative et en-tête avec profil utilisateur.
- **Landing Page** : Page d'accueil "Premium" au design moderne et épuré.

## 🌐 Internationalization (i18n)
- **Bilingue** : Français 🇫🇷 et Anglais 🇺🇸.
- **Sélecteur** : Intégré dans le menu profil pour un changement de langue à la volée.

## 📅 Gestion des Rendez-vous (CRUD & UX)
- **Interface Complète** : Liste, création, modification et annulation.
- **Modales Alpine.js** : Toutes les actions critiques (ajout, suppression) s'ouvrent dans des fenêtres modales.
- **Recherche Temps Réel** : Filtrage asynchrone (Axios) par nom de patient ou service.

## 📧 Communication
- **Mails Automatiques** : Envoi d'un email de confirmation stylisé (Markdown) lors de la création d'un rendez-vous.
- **Mail Driver** : Configuré sur `log` par défaut pour une visualisation immédiate dans les logs Laravel.

## 📡 API REST
- **Endpoints JSON** (`routes/api.php`) :
  - `GET /api/appointments` : Liste complète des rendez-vous.
  - `POST /api/appointments` : Création de rendez-vous via des applications tierces.

## 🎨 Design Premium
- **CSS** : Utilisation de Tailwind CSS avec des composants personnalisés (gradients, cartes, effets de verre).
- **Icons** : Iconographie médicale cohérente.

---
### 🚀 Comment lancer le projet ?
1. `composer install` & `npm install`
2. `php artisan migrate --seed`
3. `php artisan serve`
4. Connectez-vous avec `admin@cabinet.com` / `password`.
