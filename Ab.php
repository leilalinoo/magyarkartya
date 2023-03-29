<?php
    class Ab{
        //adattagok
        private $host = "localhost";
        private $felhasznalonev = "root";
        private $jelszo = "";
        private $abNev = "magyar_kártya";
        private $kapcsolat;
        //konstruktor
        function __construct()
        {
            $this->kapcsolat = new mysqli($this->host,
            $this->felhasznalonev,
            $this->jelszo,
            $this->abNev);
            if ($this->kapcsolat->connect_error) {
                $szoveg = "<p>sikertelen kapcsolódás</p>";
            }
            else{
                $szoveg = "<p>sikeres kapcsolódás</p>";
            }
            echo $szoveg;
            $this->kapcsolat->query("SET NAMES UTF8");
            $this->kapcsolat->query("set character set UTF8");
        }
        //metódusok
        function adatLeker($oszlop, $tabla){
            $sql = "SELECT $oszlop FROM $tabla";
            $phpTomb = $this->kapcsolat->query($sql);
            while($sor = $phpTomb->fetch_row()){
                echo "<img src=\"forras/$sor[0]\" alt=\"kártya képe\">";
                echo "<br>";
            }
        }

        function adatLeker2($oszlop1, $oszlop2, $tabla){
            $sql = "SELECT $oszlop1, $oszlop2 FROM $tabla";
            $phpTomb = $this->kapcsolat->query($sql);
            while($sor = $phpTomb->fetch_assoc()){
                echo "<p>$sor[$oszlop1]</p>";
                echo "<img src=\"forras/$sor[$oszlop2]\" alt=\"kártya képe\">";
                echo "<br>";
            }


        }

        function tablazatbaLeker($oszlop1, $oszlop2, $tabla){
            $sql = "SELECT $oszlop1, $oszlop2 FROM $tabla";
            $phpTomb = $this->kapcsolat->query($sql);
            $tablazat = "<table><thead><tr><td>NÉV</td><td>KÉP</td></tr></thead>";
            $tablazat .= "<tbody>";
            while($sor = $phpTomb->fetch_assoc()){
                $tablazat .= "<tr><td>$sor[$oszlop1]</td>";
                $tablazat .= "<td><img src=\"forras/$sor[$oszlop2]\" alt=\"kártya képe\"></td></tr>";
            }
            $tablazat .= "</tbody></table>";

            echo $tablazat;
        }


        function kapcsolatBezar(){
            $this->kapcsolat->close();
        }
    }
?>