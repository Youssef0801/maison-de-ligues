<?php
session_start();
if (isset($_SESSION['user'])) {
  header("Location: accueil.php");
} else {
  header("Location: login.php");
}
exit;
