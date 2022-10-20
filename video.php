<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div class="lewy">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div><div class="prawy">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <div class="polecamy">
        <h3>Polecamy</h3>
    <?php
    require("connect.php");
    $query = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id=18 || id=22 || id=23|| id=25";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        $nazwa=$row['nazwa'];
        $opis=$row['opis'];
        $zdjecie=$row['zdjecie'];
        echo "<div class='elegancko'><h4>$id $nazwa</h4><img src='$zdjecie'><p>$opis</p></div>";
    }
    mysqli_close($conn);
    ?>
    </div>
    <div class="fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php
    require("connect.php");
    $query = "SELECT id, nazwa, zdjecie, opis FROM produkty WHERE Rodzaje_id=12";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        $nazwa=$row['nazwa'];
        $opis=$row['opis'];
        $zdjecie=$row['zdjecie'];
        echo "<div class='elegancko'><h4>$id $nazwa</h4><img src='$zdjecie'><p>$opis</p></div>";
    }
    mysqli_close($conn);
    ?>
    </div>
    <div class="stopka">
    <form action="video.php" method="post">
            Usuń film nr.:<input type="number" name="liczba" id="liczba">
            <input type="submit" value="Usuń film">
        </form>
            <p>Stronę wykonał: Tomasz Macura</p>
        </form>
    </div>
    <?php
    require("connect.php");
    if (isset($_POST["liczba"])) {
            $liczba = $_POST["liczba"];
            $query = "DELETE FROM produkty WHERE id=$liczba";
            mysqli_query($conn,$query);
            mysqli_close($conn);
            header("Location: video.php");
        }
        ?>
</body>
</html>