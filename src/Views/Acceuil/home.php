<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Questionary</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header class="topbar">
    <a href="?c=home&a=index" class="topbar__left">
      <span class="appicon" aria-hidden="true"></span>
      <span class="apptitle">QUESTIONARY</span>
    </a>
  
    <div class="topbar__right" aria-label="Université de Limoges">
      <span class="uni-badge" aria-hidden="true">uℓ</span> 
      <span class="uni-text">Université de Limoges</span>
    </div>
  </header>

  <div class="bg">
    <span class="shape shape--oval"></span>
    <span class="shape shape--round"></span>
    <span class="shape shape--tile"></span>
    <span class="shape shape--disk"></span>
  </div>

  <main class="center">
    <section class="card" role="region" aria-labelledby="cardTitle">

      <form method="POST" action="?c=home&a=valider">
          <div class="input-wrap">
              <label for="pin" class="input-label"></label>
              <input 
                  id="pin" 
                  name="pin" 
                  type="text" 
                  inputmode="numeric" 
                  placeholder="code pin" 
                  autocomplete="one-time-code" 
                  value="<?php echo $pin_value ?? ''; ?>"
                  />
              <button class="clear" type="button" aria-label="Effacer le code">✕</button>
          </div>

          <button class="btn btn-primary" type="submit">Valider</button>
      </form>
      <a class="btn btn-secondary" href="?c=connexion&a=index">Créer un questionnaire</a>
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