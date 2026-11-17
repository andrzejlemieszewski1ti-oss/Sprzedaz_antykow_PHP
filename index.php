<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sprzedaż antyków</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  <?php
    $connect = mysqli_connect('localhost', 'root', '', 'antyki');
  ?>
  <header>
    <h1>Najlepsze antyki w mieście</h1>
  </header>
  <main>
    <section>
      <h2>- Sofy -</h2>
      <!-- skrypt1a -->
      <?php
        $zapytanie1a = "SELECT idMeble, nazwa, plik, styl, cena, opis from meble
                        where kategoria = 1";
        $wynik1a = mysqli_query($connect, $zapytanie1a);
        while($element = mysqli_fetch_array($wynik1a)){
          echo "<div class = 'mebel'>";
          echo "<div class = 'obraz'>";
          echo  "<img src='sofy/" .$element['plik']. "' alt = 'mebel'>";
          echo "</div>";
          echo "<div class= 'informacje'>";
            echo "<h3>";
            echo $element['nazwa'];
            echo "</h3>";
            echo "<h4>";
            echo "styl " .$element['styl'];
            echo "</h4>";
            echo "<h3>";
            echo "CENA: " .$element['cena']. " zł";
            echo "</h3>";
            echo "<form action='index.php' method='POST'>";
            echo "<button type='submit' name='kup' value='"
            .$element['idMeble']."'>";
            echo "KUP";
            echo "</button>";
            echo "</form>";
          echo "</div>";
          echo "<div class='opis'>";
          echo $element['opis'];
          echo "</div>";
          echo "</div><br>";
        }
      ?>
      <h2>- Fotele -</h2>
      <!-- //skrypt1b -->
      <?php
        $zapytanie1b = "SELECT idMeble, nazwa, plik, styl, cena, opis from meble
                        where kategoria = 2";
        $wynik1b = mysqli_query($connect, $zapytanie1b);
        while($element = mysqli_fetch_array($wynik1b)){
          echo "<div class = 'mebel'>";
          echo "<div class = 'obraz'>";
          echo  "<img src='fotele/" .$element['plik']. "' alt = 'mebel'>";
          echo "</div>";
          echo "<div class= 'informacje'>";
            echo "<h3>";
            echo $element['nazwa'];
            echo "</h3>";
            echo "<h4>";
            echo "styl " .$element['styl'];
            echo "</h4>";
            echo "<h3>";
            echo "CENA: " .$element['cena']. " zł";
            echo "</h3>";
            echo "<form action='index.php' method='POST'>";
            echo "<button type='submit' name='kup' value='"
            .$element['idMeble']."'>";
            echo "KUP";
            echo "</button>";
            echo "</form>";
          echo "</div>";
          echo "<div class='opis'>";
          echo $element['opis'];
          echo "</div>";
          echo "</div><br>";
        }
      ?>
      <h2>- Komody -</h2>
      <!-- skrypt1c -->
      <?php
        $zapytanie1c = "SELECT idMeble, nazwa, plik, styl, cena, opis from meble
                        where kategoria = 3";
        $wynik1c = mysqli_query($connect, $zapytanie1c);
        while($element = mysqli_fetch_array($wynik1c)){
          echo "<div class = 'mebel'>";
          echo "<div class = 'obraz'>";
          echo  "<img src='komody/" .$element['plik']. "' alt = 'mebel'>";
          echo "</div>";
          echo "<div class= 'informacje'>";
            echo "<h3>";
            echo $element['nazwa'];
            echo "</h3>";
            echo "<h4>";
            echo "styl " .$element['styl'];
            echo "</h4>";
            echo "<h3>";
            echo "CENA: " .$element['cena']. " zł";
            echo "</h3>";
            echo "<form action='index.php' method='POST'>";
            echo "<button type='submit' name='kup' value='"
            .$element['idMeble']."'>";
            echo "KUP";
            echo "</button>";
            echo "</form>";
          echo "</div>";
          echo "<div class='opis'>";
          echo $element['opis'];
          echo "</div>";
          echo "</div><br>";
        }
      ?>
      <!-- skrypt2 -->
     <?php
      if(isset($_POST['kup'])){
        $idMeble = $_POST['kup'];
        $zapytanie2 = "INSERT into zakupy (idKlienci, idMeble, sztuk) VALUES (1,$idMeble,1)";
        mysqli_query($connect, $zapytanie2);
      }
     ?>

    </section>
    <aside>
      <h2>Koszyk</h2>
      <p>Zalogowano: Anna Kowalska</p>
      <!-- skrypt3 -->
      <?php
        $zapytanie3 = "SELECT nazwa, cena from meble
                        join zakupy
                        on meble.idMeble=zakupy.idMeble
                        where idKlienci = 1 ";
        $wynik3 = mysqli_query($connect,$zapytanie3);
        echo "<ol>";
        $koszt = 0;
        while($element = mysqli_fetch_array($wynik3)){
          echo "<li>";
            echo $element['nazwa'] . ", cena:" . $element['cena'];
          echo "</li>";
          $koszt = $koszt + $element['cena'];
        }
        echo "</ol>";
        echo "Koszt całkowity:" . $koszt;
      ?>
    </aside>
  </main>
  <footer>
    <p>Stronę wykonał: 000000000000000</p>
  </footer>
  <?php
    mysqli_close($connect);
  ?>
</body>
</html>