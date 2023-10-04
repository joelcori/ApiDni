<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de DNI</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="js/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="container_inputs">
            <input type="text" placeholder="Ingrese su múmero de DNI" name="dni" id="dniB">
            <button id="consultar" type="submit">Consultar</button>
        </div>
        <div class="carnet">
            <div class="carnet_texto">
                <span>Carnet</span>
                <span >Estudiantil</span>
                <div class="c_person">
                    <img src="img/user.png" alt="" class="img_p">
                </div>
                <div class="c_logo">
                    <img src="img/logo-senati-white.png" alt="" class="logo_senati">
                </div>
            </div>

            <div class="carnet_datos">
                <span id="nombre">Nombres</span>
                <div><span id="ap">Ap</span> <span id="am">Am</span></div>
                <span>Ing. de Software con IA</span>
                <div>DNI: <span id="dni"></span></div>
            </div>
            <div class="c_hora">
                <div>
                    <span>9:00:09</span>
                </div>
                <div>
                    <span>SOMOS</span>
                    <SPAN>FUTURO</SPAN>
                </div>
            </div>
        </div>
    </div>

    <script>
        const bt = document.querySelector("#consultar");
        bt.addEventListener("click", function() {
            var dni = $("#dniB").val();

            $.ajax({
                type: "POST",
                url: "api.php",
                data: 'dni=' + dni,
                dataType: 'json',
                success: function(data) {


                    if (data == 1) {
                        alert('El DNI tiene que tener 8 digitos');
                    } else {
                        console.log(data);
                        $("#nombre").html(data.nombres);
                        $("#ap").html(data.apellidoPaterno);
                        $("#am").html(data.apellidoMaterno);
                        $("#dni").html(data.numeroDocumento);
                    }
                }
            });
        });
    </script>
</body>

</html>