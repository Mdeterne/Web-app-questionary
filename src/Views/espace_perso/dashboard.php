<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - Questionary</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

        <header class="topbar">
                <div class="topbar__left">
                    <a href="" class="topbar__logo">
                        <span class="appicon" aria-hidden="true"></span>
                        <span class="apptitle">QUESTIONARY</span>
                    </a>
                    <a class="topbar__create-link" href="?c=connexion&a=index">Créer un questionnaire</a>
                </div>
        
                <div class="topbar__right" aria-label="Université de Limoges">
                    <span class="uni-badge" aria-hidden="true">uℓ</span> 
                    <span class="uni-text">Université de Limoges</span>
                </div>
        </header>

    <div class="app-container">

        <aside class="sidebar">
            <div class="sidebar-header-box">
                Résultats
            </div>
            <nav class="sidebar-nav">
                <p style="color: #aaa; font-size: 0.8rem; padding: 10px;">Aucun résultat récent.</p> 
            </nav>
        </aside>

        <main class="main-content" id="app-dashboard">
            
            <div class="top-tools">
                <div class="search-bar-container">
                    <div class="search-wrapper">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <input type="text" placeholder="Rechercher" class="search-input" v-model="termeRecherche">
                    </div>
                </div>
                <div class="user-profile">
                    <i class="fa-solid fa-circle-user"></i>
                </div>
            </div>

            <h2 class="section-title">Créer un questionnaire</h2>
            <section class="create-section">
                
                <div class="card-create" @click="creerNouveau">
                    <div class="btn-plus">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </div>

                <div class="card-create">
                    <div class="btn-import">Importer</div>
                </div>

            </section>

            <h2 class="section-title">Vos Questionnaires</h2>
            <section class="questionnaire-grid">
                
                <div v-if="!questionnairesFiltres || questionnairesFiltres.length === 0" style="grid-column: 1 / -1; color: #888;">
                    Vous n'avez pas encore créé de questionnaire.
                </div>

            </section>

        </main>
    </div>

    <script src="https://unpkg.com/vue@3"></script>
    <script src="js/dashboard-app.js"></script>

</body>
</html>