<?php
$metaTitle = 'Contact';
$metaDescription = 'Commentaires, contact, adresse, telephone';

include('ressources/views/layouts/header.php');

$formErrors = []; // Stocke les erreurs du formulaire
$formData = []; // Stocke les données du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filters = [
        'status' => FILTER_SANITIZE_STRING,
        'firstname' => FILTER_SANITIZE_STRING,
        'lastname' => FILTER_SANITIZE_STRING,
        'email' => FILTER_SANITIZE_EMAIL,
        'reason' => FILTER_SANITIZE_STRING,
        'message' => FILTER_SANITIZE_STRING,
    ];
}

$formData = filter_input_array(INPUT_POST, $filters);

  if (!in_array($formData['status'], ['M.', 'Mme'])) {
      $formErrors['status'] = 'Merci de choisir une civilité valide.';
  }
  if (empty($formData['firstname'])) {
      $formErrors['firstname'] = 'Le champ prénom ne peut pas être vide.';
  }
  if (empty($formData['lastname'])) {
      $formErrors['lastname'] = 'Le champ nom ne peut pas être vide.';
  }
  if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
      $formErrors['email'] = 'Merci de saisir un email valide.';
  }
  if (!in_array($formData['reason'], ['emploi', 'info', 'prestation'])) {
      $formErrors['reason'] = 'Merci de choisir une raison de contact valide.';
  }
  if (!$formData['message'] || strlen($formData['message']) < 5) {
      $formErrors['message'] = "Message invalide. Il doit contenir au moins 5 lettres.";
  }
?>
?>

<main>
    <div class="mx-auto justify-content-center align-items-center col-10 col-md-8 col-lg-8">
      <div class="text-center p-5">
        <h1 class="mb-3">Contact</h1>
      </div>

      <form method="post" action="http://blog.local/php/index.php?action=contact"
        class="mx-auto justify-content-center align-items-center col-10 col-md-8 col-lg-8">
        <div class="form-group mb-3">
          <select class="form-control text-secondary" id="civilité" name="status">
            <option value="Mme">Mme</option>
            <option value="M.">M.</option>
          </select>
          <!--a répéter pour chaque champs        -->
        <div class="form-error">
            <?= $formErrors['status'] ?? ''; ?>
        </div>

        <div class="col mb-3">
          <input type="text" class="form-control" placeholder="Nom" name="lastname">
        </div>
        <div class="form-error">
            <?= $formErrors['lastname'] ?? ''; ?>
        </div>
          <div class="col mb-3">
              <input type="text" class="form-control" placeholder="Prénom" name="firstname">
          </div>
          <div class="form-error">
            <?= $formErrors['firstname'] ?? ''; ?>
        </div>
          <div class="form-group mb-3">
              <input type="email" class="form-control" id="e-mail" placeholder="E-mail"  name="email">
        </div>
        <div class="form-error">
            <?= $formErrors['email'] ?? ''; ?>
        </div>
        <div class="form-group mb-3">
              <input type="radio" id="Proposition d'emploi" name="reason" value="Proposition d'emploi">
              <label for="Proposition d'emploi">Proposition d'emploi</label><br>
              <input type="radio" id="Demande d'information" name="reason" value="Demande d'information">
              <label for="Demande d'information">Demande d'information</label><br>
              <input type="radio" id="Prestations" name="reason" value="Prestations">
              <label for="Prestations">Prestations</label><br>
        </div>
        <div class="form-group mb-4">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message"></textarea>
        </div>
        <div class="form-error">
            <?= $formErrors['message'] ?? ''; ?>
        </div>
        <div class="text-center mb-5">
          <button type="submit" class="btn btn-success" name="submit">Envoyer</button>
        </div>
      </form>
    </div>
  </main>
<!--    Noté la syntaxe alternative de php utilisé dans les tempaltes cf @https://www.php.net/manual/fr/control-structures.alternative-syntax.php-->

<?php if (!empty($formErrors)): ?>
        <ul>
            <?php foreach ($formErrors as $field => $error): ?>
                <li><strong><?= ucfirst($field) ?>:</strong> <?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>

<?php include ('ressources/views/layouts/footer.php'); ?>

