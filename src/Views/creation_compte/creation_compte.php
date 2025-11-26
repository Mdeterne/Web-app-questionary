<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Questionary - Créer un compte</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="style.css" />
  
  <style>
      .error-text {
      color: #b52424; 
      font-size: 14px;
      font-weight: 500;
      text-align: center;
      margin-top: -8px; 
      margin-bottom: 12px;
      min-height: 1.2em;
    }
  </style>

</head>
<body>
  <header class="topbar">
    <a href="?c=home&a=index" class="topbar__left">
        <span class="appicon" aria-hidden="true"></span>
        <span class="apptitle">QUESTIONARY</span>
    </a>
  
    <div class="topbar__right" aria-label="Université de Limoges">
        <span class="uni-badge" aria-hidden="true"></span>
        <span class="uni-text">Université de Limoges</span>
    </div>
    </header>

  <main class="center">
  <section class="card" role="region" aria-labelledby="cardTitle">

    <?php 
    $error = isset($_GET['error']) ? htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') : '';
    if ($error === 'empty_fields'): ?>
      <p class="error-text">Veuillez remplir tous les champs.</p>
    <?php elseif ($error === 'invalid_email'): ?>
      <p class="error-text">L'adresse e-mail n'est pas valide.</p>
    <?php elseif ($error === 'password_mismatch'): ?>
      <p class="error-text">Les mots de passe ne correspondent pas.</p>
    <?php endif; ?>

    <form method="POST" action="?c=creerUnCompte&a=creerUnCompte">
        
        <div class="input-wrap">
            <label for="email" class="input-label">Adresse e-mail :</label>
            <input 
                id="email" 
                name="adresse_email" 
                type="email" 
                inputmode="email" placeholder="" 
                autocomplete="email"
                required />
            <button class="clear" type="button" aria-label="Effacer l'adresse e-mail">✕</button>
        </div>

        <div class="input-wrap">
            <label for="username" class="input-label">Nom d'utilisateur :</label>
            <input 
                id="username" 
                name="nom_utilisateur" 
                type="text" 
                inputmode="text" placeholder="" 
                autocomplete="username"
                required />
            <button class="clear" type="button" aria-label="Effacer le nom d'utilisateur">✕</button>
        </div>

        <div class="input-wrap">
            <label for="password" class="input-label">Mot de passe :</label>
            <input 
                id="password" name="mot_de_passe" 
                type="password" 
                inputmode="text" 
                placeholder="" 
                autocomplete="new-password"
                minlength="8"
                required />
                <button class="clear" type="button" aria-label="Effacer le mot de passe">✕</button>
                
        </div>

        <div class="input-wrap">
            <label for="password_confirm" class="input-label">Confirmer mot de passe :</label>
            <input 
                id="password_confirm" name="mot_de_passe_confirm" type="password" 
                inputmode="text" 
                placeholder="" 
                autocomplete="new-password"
                minlength="8"
                required /> <button class="clear" type="button" aria-label="Effacer le mot de passe">✕</button>
        </div>

        <div id="error-message" class="error-text"></div>
        
        <button class="btn btn-primary" type="submit">Créer un compte</button>
    </form>
    
    <a href="?c=connexion&a=index" class="btn btn-secondary" style="margin-top: 10px;">J'ai déjà un compte</a>
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

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      
      const clearButtons = document.querySelectorAll('.clear');
      clearButtons.forEach(button => {
        button.addEventListener('click', function() {
          const inputWrapper = this.closest('.input-wrap');
          if (inputWrapper) {
            const inputField = inputWrapper.querySelector('input');
            if (inputField) {
              inputField.value = '';
              inputField.focus();
            }
          }
        });
      });

      
      const form = document.querySelector('form');
      const passwordField = document.querySelector('#password');
      const confirmPasswordField = document.querySelector('#password_confirm');
      const errorMessage = document.querySelector('#error-message');

      form.addEventListener('submit', function(event) {
        
        if (passwordField.value !== confirmPasswordField.value) {
          
          event.preventDefault(); 
          
          errorMessage.textContent = 'Erreur : Les mots de passe ne correspondent pas.';
          
        } else {
          
          errorMessage.textContent = '';
        }
      });

      passwordField.addEventListener('input', () => {
          errorMessage.textContent = '';
      });
      confirmPasswordField.addEventListener('input', () => {
          errorMessage.textContent = '';
      });

    });
  </script>

</body>
</html>