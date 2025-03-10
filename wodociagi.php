<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wodomierz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn>connect_error) {
    die("Połączenie nieudane:" . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $miejscowosc = htmlspecialchars($_POST['miejscowosc']);
    $adres = htmlspecialchars($_POST['adres']);
    $numer_wodomierza_glowny = htmlspecialchars($_POST['numer_wodomierza_glowny']);
    $stan_wodomierza_glowny = htmlspecialchars($_POST['stan_wodomierza_glowny']);
    $numer_wodomierza_dodatkowy = htmlspecialchars($_POST['numer_wodomierza_dodatkowy']);
    $stan_wodomierza_dodatkowy = htmlspecialchars($_POST['stan_wodomierza_dodatkowy']);
    $imie = htmlspecialchars($_POST['imie']);
    $nazwisko = htmlspecialchars($_POST['nazwisko']);
    $email = htmlspecialchars($_POST['email']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $numer_nabywcy = htmlspecialchars($_POST['numer_nabywcy']);   
} 

if (!empty($miejscowosc) && !empty($email) && !empty($stan_wodomierza_glowny))
$sql = "INSERT INTO kontakt (miejscowosc, adres, numer_wodomierza_glowny, stan_wodomierza_glowy, numer_wodomierza_dodatkowy, stan_wodomierza_dodatkowy, imie, nazwisko, email, telefon, numer_nabywcy) VALUES (?,?,?)";
$stmt = $conn_>prepare($sql);
$stmt->bind_param("ssssssssssss", $miejscowosc, $adres, $numer_wodomierza_glowny, $stan_wodomierza_glowny, $numer_wodomierza_glowny, $stan_wodomierza_dodatkowy, $imie, $nazwisko, $email, $telefon, $numer_nabywcy);


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz Zgłoszeniowy</title>
</head>
<body>
    <h1>Formularz zgłoszeniowy z stanem wodomierzy</h1>
    <form action="/submit" method="POST">
        <label for="miejscowosc">Miejscowość </label>
        <input type="text" id="miejscowosc" name="miejscowosc" required><br><br>

        <label for="adres">Adres poboru wody Ulica i numer</label>
        <input type="text" id="adres" name="adres" required><br><br>

        <label for="numer_wodomierza_glowny">Numer wodomierza głównego </label>
        <input type="text" id="numer_wodomierza_glowny" name="numer_wodomierza_glowny" required><br><br>

        <label for="stan_wodomierza_glowny">Stan wodomierza głównego </label>
        <input type="text" id="stan_wodomierza_glowny" name="stan_wodomierza_glowny" required><br><br>

        <label for="numer_wodomierza_dodatkowy">Numer wodomierza dodatkowego (opcjonalnie)</label>
        <input type="text" id="numer_wodomierza_dodatkowy" name="numer_wodomierza_dodatkowy"><br><br>

        <label for="stan_wodomierza_dodatkowy">Stan wodomierza dodatkowego (opcjonalnie)</label>
        <input type="text" id="stan_wodomierza_dodatkowy" name="stan_wodomierza_dodatkowy"><br><br>

        <label for="imie">Imię </label>
        <input type="text" id="imie" name="imie" required><br><br>

        <label for="nazwisko">Nazwisko </label>
        <input type="text" id="nazwisko" name="nazwisko" required><br><br>

        <label for="email">Email </label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefon">Nr telefonu</label>
        <input type="tel" id="telefon" name="telefon" required><br><br>

        <label for="numer_nabywcy">Numer nabywcy</label>
        <input type="text" id="numer_nabywcy" name="numer_nabywcy" required><br><br>

        <button type="submit">Wyślij stan wodomierzy</button>
    </form>
</body>
</html>
