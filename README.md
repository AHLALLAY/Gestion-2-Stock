# Gestion de stock & inventaire
Bienvenue sur le dépôt de l’application de gestion de stock et d’inventaire pour boutique d’accessoires et de réparation de téléphones.

## 🚀 Présentation
Cette application web permet de gérer facilement les produits, les ventes et le stock d’une boutique. Elle s’adresse aux gestionnaires, vendeurs et administrateurs souhaitant centraliser et automatiser le suivi de leur inventaire.

## ✨ Fonctionnalités principales
- Gestion des catégories, sous-catégories et produits
- Suivi des ventes et du stock en temps réel
- Alertes de stock bas, inventaire, historiques
- Statistiques et rapports exportables (CSV, Excel, PDF)
- Authentification et gestion des utilisateurs

## 📦 Installation rapide
1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/AHLALLAY/Gestion-2-Stock.git
   ```
2. **Backend (Laravel)**
   ```bash
   cd Code/Backend
   composer install
   cp .env.example .env
   # Configurer la base de données PostgreSQL dans .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   ```
3. **Frontend (React.js)**
   ```bash
   cd ../Frontend
   npm install
   npm start
   ```

## 🤝 Contribution

Les contributions sont les bienvenues !
- Consulte le [cahier des charges](./Docs/cahier-des-charges.html) pour comprendre la vision et les besoins.
- Les tâches et le planning sont détaillés dans [Tasks](./Docs/tasks-gestion-stock.html).
- Ouvre une issue ou une pull request pour proposer une amélioration ou corriger un bug.

## 📚 Documentation & ressources
- [cahier des charges](./Docs/cahier-des-charges.html)
- [Tâches & planning](./Docs/tasks-gestion-stock.html)