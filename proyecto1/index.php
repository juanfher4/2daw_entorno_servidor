<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Números primos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            
            *{
                font-family: rufina;
            }

            .row{
                background-color: rgb(109, 259, 334);
            }

            .col{
                background-color: rgb(129, 199, 294);
                border-radius: 10px;
                max-height: 350px;
                margin-top: 5rem;
                
            }

        </style>
    </head>
    <body>
        <div class="cont">
            </div>
            <div class="row p-4">
            <div class="col m-4 p-3">
                    <h1>Números primos</h1>
                    <p>Ejercicio para mostrar los números primos que hay hasta uno dado por el usuario.</p>
                    <p>--------></p>
                </div>
                <div class="col m-4 p-3">
                    <h1>Solución</h1>
                    <?php
                    {
                        for($i=1;$i<=100;$i++)
                            {
                                if(esPrimo($i))
                                    print $i.", ";
                            }

                        function esPrimo($num){
                            $cont = 0;
                               for ($i=1; $i <= $num; $i++) {
                                  if ($num % $i==0) 
                                    $cont = $cont + 1;
                               }
                            if ($cont==2) return true;
                               return false;
                            }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
