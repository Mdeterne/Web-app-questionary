<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Questionary</title>

  <!-- Police moderne et sobre -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <!-- Topbar -->
  <header class="topbar">
    <div class="topbar__left">
      <span class="appicon" aria-hidden="true"></span>
      <span class="apptitle">QUESTIONARY</span>
    </div>
    <div class="topbar__right" aria-label="Université de Limoges">
      <span class="uni-badge" aria-hidden="true">uℓ</span>
      <span class="uni-text">Université de Limoges</span>
    </div>
  </header>

  <!-- Fond formes -->
  <div class="bg">
    <span class="shape shape--oval"></span>
    <span class="shape shape--round"></span>
    <span class="shape shape--tile"></span>
    <span class="shape shape--disk"></span>
  </div>

  <!-- Contenu principal -->
<main class="center">
  <section class="card" role="region" aria-labelledby="cardTitle">

    <form method="POST" action="login_action.php">
        
        <div class="input-wrap">
            <label for="username" class="input-label">Nom d'utilisateur :</label>
            <input 
                id="username" 
                name="nom_utilisateur" 
                type="text" 
                inputmode="text" placeholder="" 
                autocomplete="username"
                value="<?php echo $username_value ?? ''; ?>" />
            <button class="clear" type="button" aria-label="Effacer le nom d'utilisateur">✕</button>
        </div>

        <div class="input-wrap">
            <label for="password" class="input-label">Mot de passe :</label>
            <input 
                id="password" 
                name="mot_de_passe" 
                type="password" inputmode="text" placeholder="" 
                autocomplete="current-password"
                value="<?php echo $username_value ?? ''; ?>"
                /> <button class="clear" type="button" aria-label="Effacer le mot de passe">✕</button>
        </div>

        
        <button class="btn btn-primary" type="submit">Se connecter</button>
    </form>
    
    <a href="creer_compte.php" class="btn btn-secondary">Créer un compte</a>
  </section>
</main>

  <!-- Pied de page -->
  <footer class="footer">
    <nav class="footer__links" aria-label="Liens légaux">
      <a href="#" title="Conditions générales">Conditions générales</a>
      <span aria-hidden="true">|</span>
      <a href="#" title="Confidentialité">Confidentialité</a>
      <span aria-hidden="true">|</span>
      <a href="#" title="Utilisation des cookies">Utilisation des cookies</a>
    </nav>
  </footer>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      
      // Trouve TOUS les boutons avec la classe "clear"
      const clearButtons = document.querySelectorAll('.clear');

      clearButtons.forEach(button => {
        button.addEventListener('click', function() {
          // 1. Trouve le parent ".input-wrap" le plus proche
          const inputWrapper = this.closest('.input-wrap');
          
          if (inputWrapper) {
            // 2. Trouve le SEUL input dans ce parent
            const inputField = inputWrapper.querySelector('input');
            
            if (inputField) {
              // 3. Vide cet input spécifique
              inputField.value = '';
              inputField.focus();
            }
          }
        });
      });
    });
  </script>

</body>
</html>
</body>
</html>
