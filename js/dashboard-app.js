// Mock data for questionnaires (to be replaced with real backend API)
const mockMesQuestionnaires = [
  { "id": 1, "titre": "Sondage Satisfaction Client 2024", "pin": "123456" },
  { "id": 2, "titre": "Quiz de Noël - Équipe Marketing", "pin": "789012" },
  { "id": 3, "titre": "Formulaire d'inscription Webinaire", "pin": "456789" },
  { "id": 4, "titre": "Test de connaissances PHP", "pin": "987654" }
];

const { createApp } = Vue;

createApp({
    data() {
        return {
            questionnaires: [], 
            termeRecherche: '',
            isLoading: true
        };
    },

    computed: {
        questionnairesFiltres() {
            if (this.termeRecherche === '') {
                return this.questionnaires;
            }
            
            const recherche = this.termeRecherche.toLowerCase();
            return this.questionnaires.filter(q => 
                q.titre.toLowerCase().includes(recherche)
            );
        }
    },

    methods: {
        loadQuestionnaires() {
            this.isLoading = true;
            console.log("[Front-End] Simulation: Chargement des questionnaires...");
            
            //TODO BACK-END: remplacer par un 'fetch' vers: ?c=espacePerso&a=getMesQuestionnaires
            //L'API doit répondre en JSON
            
            setTimeout(() => {
                this.questionnaires = mockMesQuestionnaires; 
                this.isLoading = false;
                console.log("[Front-End] Simulation: Données chargées.");
            }, 500); 
        },

        creerNouveau() {
            console.log("[Front-End] Simulation: Demande de création...");
            
            // TODO (Pour le Back-End): remplacer par 'fetch' en 'POST' vers: ?c=espacePerso&a=creerNouveau
            // En cas de succès, récupérer l'ID du nouveau questionnaire et rediriger

            setTimeout(() => {
                const nouveauIdSimule = 99; // Faux ID
                console.log(`[Front-End] Simulation: Questionnaire ${nouveauIdSimule} créé.`);
                
                window.location.href = `?c=createur&a=index&id=${nouveauIdSimule}`;
            }, 300);
        },
        
        supprimer(id) {
            if (!confirm("Êtes-vous sûr de vouloir supprimer ce questionnaire ?")) {
                return; // L'utilisateur a annulé
            }
            
            console.log(`[Front-End] Simulation: Demande de suppression id ${id}...`);
            
            // TODO BACK-END: remplacer par 'fetch' en 'DELETE' vers: ?c=espacePerso&a=supprimer&id=ID_QUESTIONNAIRE
            // En cas de succès, enlever le questionnaire de la liste
            
            setTimeout(() => {
                this.questionnaires = this.questionnaires.filter(q => q.id !== id);
                console.log(`[Front-End] Simulation: Questionnaire ${id} supprimé.`);
            }, 300);
        }
    },
    mounted() {
        this.loadQuestionnaires();
    }

}).mount('#app-dashboard'); 