<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Configurez les détails de l'e-mail
  $to = "hegetimothe@gmail.com";
  $subject = "Nouveau message de contact";
  $body = "Nom: $name\nEmail: $email\nMessage: $message";

  // Envoyer l'e-mail
  if (mail($to, $subject, $body)) {
    echo "Merci, votre message a été envoyé avec succès.";
  } else {
    echo "Désolé, une erreur s'est produite lors de l'envoi de votre message.";
  }
}
?>
