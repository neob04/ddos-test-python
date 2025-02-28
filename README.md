# Test de Charge Local - Projet Éducatif

## ⚠️ Avertissements Importants

Ce projet est **STRICTEMENT** à but éducatif et doit être utilisé uniquement dans un environnement de test local contrôlé.

### Aspects Légaux
- Les attaques DDoS sont illégales (Article 323-2 du Code pénal français)
- L'utilisation malveillante de ce code est interdite
- Ne testez jamais sur des sites sans autorisation

## 📋 Description

Simulation de test de charge simple permettant de comprendre :
- Le fonctionnement des requêtes HTTP multiples
- La gestion des logs serveur
- Le multi-threading en Python
- L'interaction PHP-Python

## 🔧 Prérequis

- XAMPP (Apache + PHP)
- Python 3.x
- Module Python `requests`

## 🚀 Installation

1. Cloner le dépôt :
```bash
git clone https://github.com/votre-username/ddos-test-python.git
cd ddos-test-python
```

2. Installer les dépendances :
```bash
pip install requests
```

3. Configurer XAMPP :
   - Copier le projet dans `c:/xampp/htdocs/ddos-test-python/`
   - Démarrer Apache dans XAMPP

## 💻 Utilisation

1. Lancer le serveur web local via XAMPP
2. Accéder à `http://localhost/ddos-test-python/sim_ddos.php`
3. Exécuter le script Python :
```bash
python test_load.py
```

## 📁 Structure du Projet

```
ddos-test-python/
├── sim_ddos.php      # Interface web et logs
├── test_load.py      # Script de test Python
├── .gitignore        # Configuration des fichiers ignorés
├── assets/
│   └── css/
│       └── style.css # Styles de l'interface
└── README.md         # Documentation
```

## ⚙️ Configuration

Paramètres modifiables dans `test_load.py` :
- `thread_count` : nombre de threads simultanés
- `max_requests` : requêtes par thread
- `time.sleep()` : délai entre les requêtes

## 🛡️ Bonnes Pratiques

1. **Sécurité** :
   - Utiliser uniquement en local
   - Ne pas exposer sur Internet
   - Limiter le nombre de requêtes

2. **Tests** :
   - Commencer avec peu de threads
   - Augmenter progressivement
   - Surveiller les performances

## 👥 Contribution

Les contributions sont bienvenues mais doivent respecter :
- L'aspect éducatif du projet
- Les bonnes pratiques de sécurité
- Le code de conduite

## 📝 Licence & Responsabilité

Ce projet est fourni à des fins éducatives uniquement. Toute utilisation doit se faire en accord avec les lois en vigueur et uniquement dans un environnement de test local contrôlé. Les auteurs déclinent toute responsabilité en cas d'utilisation malveillante ou illégale.