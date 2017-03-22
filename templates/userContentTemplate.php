
<?php
echo "<p> Bonjour à toi: " . Request::getCurrentRequest()->getUser()." </p>";
echo Request::getCurrentRequest()->lireR();
?>

