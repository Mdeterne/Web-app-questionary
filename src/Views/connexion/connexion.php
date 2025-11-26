<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Questionary - Connexion</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="style.css" />
  <style>
    .error-text {
      color: #b52424;
      font-size: 14px;
      font-weight: 500;
      text-align: center;
      margin-top: 8px;
      min-height: 1.2em;
    }
    .success-text {
      color: #28a745;
      font-size: 14px;
      font-weight: 500;
      text-align: center;
      margin-bottom: 12px;
      min-height: 1.2em;
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

  <main class="center">
  <section class="card" role="region" aria-labelledby="cardTitle">
    <?php 
    $error = isset($_GET['error']) ? htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') : '';
    $success = isset($_GET['success']) ? htmlspecialchars($_GET['success'], ENT_QUOTES, 'UTF-8') : '';
    if ($success === 'account_created'): ?>
      <p class="success-text">Compte créé avec succès ! Connectez-vous.</p>
    <?php endif; ?>

    <form method="POST" action="?c=connexion&a=connexion">
        
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
                id="password" 
                name="mot_de_passe" 
                type="password" inputmode="text" placeholder="" 
                autocomplete="current-password"
                required /> <button class="clear" type="button" aria-label="Effacer le mot de passe">✕</button>
        </div>

        <?php if ($error === 'empty_fields'): ?>
          <p class="error-text">Veuillez remplir tous les champs.</p>
        <?php elseif ($error === 'invalid_credentials'): ?>
          <p class="error-text">Identifiants incorrects.</p>
        <?php endif; ?>
        
        <button class="btn btn-primary" type="submit">Se connecter</button>
    </form>
    
    <a href="?c=creerUnCompte&a=index" class="btn btn-secondary">Créer un compte</a>
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
    });
  </script>

</body>
</html>
