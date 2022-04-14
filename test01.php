<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./css/style01.css">
</head>

<body>

    <h1>Lista de alimentos</h1>
    <?php
    $frutas = array("mango","piña","manzana");
    $verduras = array ("espinaca","tomate","apio");
    function writeOption($option){
        return  '<option  >'  . ucfirst($option) . "</option>";
    }
    ?>
    <div class="row">
        <div class="column">
            <form action="" method="post">
                <select name="Alimento"  onchange="this.form.submit()">
                <option>Seleccione una opción</option>
                <option>Doritos</option>
                    <?php
                    $x = 0;
                    while ($x < count($frutas)) {

                        echo writeOption($frutas[$x]);
                        $x = $x + 1;
                    }
                    foreach ($verduras as $verdura ) {
                        echo writeOption($verdura);
                    }
                    ?>
                </select>
            </form>
        </div>
        <div class="column">
            <?php
            if(isset($_POST["Alimento"])){
                $Alimento = $_POST["Alimento"];

                switch (substr($Alimento,-1)) {
                    case 'a':
                        $Sujeto ="La";
                        break;
                    
                    default:
                        $Sujeto= "El";
                        break;
                }
                if(in_array(strtolower($Alimento),$frutas)){
                    echo "{$Sujeto} {$Alimento}  es una fruta";
                }
                elseif (in_array(strtolower($Alimento),$verduras)) {
                    echo"{$Sujeto} {$Alimento} es una verdura";
                }
                else {
                    echo"No es fruta ni verdura";
                }
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <?php
        
            for ($i=0; $i < count($frutas); $i++) { 
                echo "<p>" . $frutas[$i] . "</p>";
            }
            ?>
        </div>
        <div class="column">
            <?php
                $i=0;
                do {
                    echo "<p>" . $verduras[$i] . "</p>";
                    $i++;
                } while ($i < count($verduras));
            ?>
        </div>
    </div>

</body>

</html>