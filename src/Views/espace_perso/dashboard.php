<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - Questionary</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    
    <?php 
        // peut etre rajouter header
    ?>

    <main id="app-dashboard">
        
        <section class="dashboard-create-new">
            <h2>Commencer un nouveau questionnaire</h2>
            <button @click="creerNouveau">Créer un nouveau</button>
        </section>

        <section class="dashboard-list">
            <h2>Mes questionnaires</h2>
            
            <input type="text" v-model="termeRecherche" placeholder="Rechercher...">
            
            <div class="questionnaire-grid">
                
                <div v...for="q in questionnairesFiltres" :key="q.id" class="questionnaire-card">
                    <h3>{{ q.titre }}</h3>
                    <p>PIN: <strong>{{ q.pin }}</strong></p>
                    <a :href="'?c=createur&a=index&id=' + q.id">Ouvrir</a>
                    <button @click="supprimer(q.id)">Supprimer</button>
                </div>

            </div>
        </section>

    </main>

    <?php 
        // pareil pour un footer potentiel 
    ?>

    <script src="https://unpkg.com/vue@3"></script>
    
    <script src="js/dashboard-app.js"></script>

</body>
</html>