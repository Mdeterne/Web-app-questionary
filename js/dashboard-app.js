import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { mockMesQuestionnaires } from './mock-data.js'; 

createApp({
    data() {
        return {
            questionnaires: [], 
            termeRecherche: '',
            isLoading: true,
            showUserMenu: false // IMPORTANT : Par défaut le menu est caché
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
        // IMPORTANT : La méthode appelée quand on clique sur l'image
        toggleUserMenu() {
            console.log("Clic menu ! État actuel : " + this.showUserMenu);
            this.showUserMenu = !this.showUserMenu;
        },

        loadQuestionnaires() {
            this.isLoading = true;
            console.log("[Front-End] Simulation: Chargement des questionnaires...");
            
            setTimeout(() => {
                this.questionnaires = mockMesQuestionnaires; 
                this.isLoading = false;
                console.log("[Front-End] Simulation: Données chargées.");
            }, 500); 
        },

        creerNouveau() {
            console.log("[Front-End] Simulation: Demande de création...");
            setTimeout(() => {
                const nouveauIdSimule = 99;
                console.log(`[Front-End] Simulation: Questionnaire ${nouveauIdSimule} créé.`);
                window.location.href = `?c=createur&a=index&id=${nouveauIdSimule}`;
            }, 300);
        },
        
        supprimer(id) {
            if (!confirm("Êtes-vous sûr de vouloir supprimer ce questionnaire ?")) {
                return;
            }
            console.log(`[Front-End] Simulation: Demande de suppression id ${id}...`);
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