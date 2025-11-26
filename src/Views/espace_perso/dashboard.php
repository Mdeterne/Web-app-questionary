<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - Questionary</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px 24px;
        }
        
        .dashboard-create-new {
            background: #fff;
            border-radius: 18px;
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            text-align: center;
        }
        
        .dashboard-create-new h2 {
            margin: 0 0 16px 0;
            font-size: 24px;
            color: #252525;
        }
        
        .dashboard-create-new button {
            background: #252525;
            color: #fff;
            border: none;
            padding: 14px 32px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .dashboard-create-new button:hover {
            background: #424242;
        }
        
        .dashboard-list h2 {
            margin: 0 0 20px 0;
            font-size: 22px;
            color: #252525;
        }
        
        .dashboard-list input[type="text"] {
            width: 100%;
            max-width: 400px;
            padding: 14px 16px;
            border: 1px solid #cfd3d7;
            border-radius: 12px;
            font-size: 16px;
            margin-bottom: 24px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        
        .dashboard-list input[type="text"]:focus {
            border-color: #252525;
            box-shadow: 0 0 0 3px rgba(37, 37, 37, 0.1);
        }
        
        .questionnaire-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
        }
        
        .questionnaire-card {
            background: #fff;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .questionnaire-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        
        .questionnaire-card h3 {
            margin: 0 0 12px 0;
            font-size: 18px;
            color: #252525;
        }
        
        .questionnaire-card p {
            margin: 0 0 16px 0;
            color: #666;
            font-size: 14px;
        }
        
        .questionnaire-card a {
            display: inline-block;
            background: #252525;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-right: 8px;
            transition: background 0.2s;
        }
        
        .questionnaire-card a:hover {
            background: #424242;
        }
        
        .questionnaire-card button {
            background: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .questionnaire-card button:hover {
            background: #c82333;
        }
        
        .loading-indicator {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #666;
            background: #f8f9fa;
            border-radius: 14px;
        }
    </style>
</head>
<body>
    
    <header class="topbar">
        <div class="topbar__left">
            <a href="?c=home&a=index" class="topbar__logo">
                <span class="appicon" aria-hidden="true"></span>
                <span class="apptitle">QUESTIONARY</span>
            </a>
        </div>
        <div class="topbar__right" aria-label="Université de Limoges">
            <span class="uni-badge" aria-hidden="true">uℓ</span> 
            <span class="uni-text">Université de Limoges</span>
        </div>
    </header>

    <main id="app-dashboard" class="dashboard-container">
        
        <section class="dashboard-create-new">
            <h2>Commencer un nouveau questionnaire</h2>
            <button @click="creerNouveau">Créer un nouveau</button>
        </section>

        <section class="dashboard-list">
            <h2>Mes questionnaires</h2>
            
            <input type="text" v-model="termeRecherche" placeholder="Rechercher un questionnaire...">
            
            <div v-if="isLoading" class="loading-indicator">
                Chargement de vos questionnaires...
            </div>
            
            <div v-else-if="questionnairesFiltres.length === 0" class="empty-state">
                <p v-if="termeRecherche">Aucun questionnaire ne correspond à votre recherche.</p>
                <p v-else>Vous n'avez pas encore de questionnaire. Créez-en un !</p>
            </div>
            
            <div v-else class="questionnaire-grid">
                
                <div v-for="q in questionnairesFiltres" :key="q.id" class="questionnaire-card">
                    <h3>{{ q.titre }}</h3>
                    <p>PIN: <strong>{{ q.pin }}</strong></p>
                    <a :href="'?c=createur&a=index&id=' + q.id">Ouvrir</a>
                    <button @click="supprimer(q.id)">Supprimer</button>
                </div>

            </div>
        </section>

    </main>

    <footer class="footer">
        <nav class="footer__links" aria-label="Liens légaux">
            <a href="#" title="Conditions générales">Conditions générales</a>
            <span aria-hidden="true">|</span>
            <a href="#" title="Confidentialité">Confidentialité</a>
            <span aria-hidden="true">|</span>
            <a href="#" title="Utilisation des cookies">Utilisation des cookies</a>
        </nav>
    </footer>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    
    <script src="js/dashboard-app.js"></script>

</body>
</html>