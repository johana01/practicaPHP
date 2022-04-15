<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./css/style01.css">
</head>

<body>

    <h1>Lista de alimentos</h1>
    <?php
    // Se define los arreglos de frutas y verduras
    $frutas = array("mango", "piña", "manzana");
    $verduras = array("espinaca", "tomate", "apio");
    // Funcion encargada de manera dinamica el tag
    function writeOption($option)
    {
        return  '<option  >'  . ucfirst($option) . "</option>";
    }
    ?>
    <div class="row">
        <div class="column">
            <form action="" method="post">
                <select name="Alimento" onchange="this.form.submit()">
                    <option>Seleccione una opción</option>
                    <option>Hamburguesa</option>
                    <option>Perro Caliente</option>
                    <?php
                    // Recorrer el arreglo para capturar los valores de frutas
                    $x = 0;
                    while ($x < count($frutas)) {

                        echo writeOption($frutas[$x]);
                        $x = $x + 1;
                    }
                    // Uso de la estructura de control arreglo foreach para las verduras
                    foreach ($verduras as $verdura) {
                        echo writeOption($verdura);
                    }
                    ?>
                </select>
            </form>
        </div>
        <div class="column">
            <?php
            // Uso de la estructura de control if para el envio del formulario mediante el metodo POST
            if (isset($_POST["Alimento"])) {
                $Alimento = $_POST["Alimento"];
                // Uso de la función sobre cadenas substr para capturar la última letra del alimento y 
                // asignar el sujeto adecuado dentro de la oración a visualizar
                switch (substr($Alimento, -1)) {
                    case 'a':
                        $Sujeto = "La";
                        break;

                    default:
                        $Sujeto = "El";
                        break;
                }
                // Garantiza si el alimento es una fruta, una verdura o es un elemento sin clasificar.
                if (in_array(strtolower($Alimento), $frutas)) {
                    echo "{$Sujeto} {$Alimento}  es una fruta";
                } elseif (in_array(strtolower($Alimento), $verduras)) {
                    echo "{$Sujeto} {$Alimento} es una verdura";
                } else {
                    echo "No es fruta ni verdura";
                }
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <?php
            // Para la visualización completa e independiente de los arreglos de frutas y verduras 
            for ($i = 0; $i < count($frutas); $i++) {
                echo "<p>" . $frutas[$i] . "</p>";
            }
            ?>
        </div>
        <div class="column">
            <?php
            $i = 0;
            do {
                echo "<p>" . $verduras[$i] . "</p>";
                $i++;
            } while ($i < count($verduras));
            ?>
        </div>
    </div>

</body>

</html>