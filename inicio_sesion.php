<?php
include_once("header.html");
?>

<body>
    <?php
    include_once("menu.php");
    ?>

    <!-------------------------contenido--------------------------------->
    <script>
        function validateForm(){

            var valido = true;

            var usuario = document.getElementById("usuario").value;
            if(!/^[a-zA-z0-9\s]+$/.test(nombre)){
                document.getElementById("usuarioError").innerText="Usuario inválido, no puede contener carácteres especiales";
                valido = false;
            }else{
                document.getElementById("usuarioError").innerText="Usuario ingresado correctamente";
            }

            var password = document.getElementById("password").value;
            if(/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).+$/.test(password)){
                document.getElementById("passwordError").innerText="Contraseña inválida, debe contener al menos una letra, un número y un carácter especial";
                valido = false;
            }else{
                document.getElementById("passwordError").innerText="Contraseña ingresada correctamente";
            }

            return valido;
        }
    </script>

    <div class="container">
        <h1>Iniciar sesi&oacute;n</h1>
        <form name="inicio_sesion" action="reservaciones.php" method="post">
            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" placeholder="Ingrese su nombre de usuario" required>
            <span class="error" id="usuarioError"></span>

            <label for="password">Contrase&ntilde;a: </label>
            <input type="password" name="password" placeholder="Digite su contraseña" required>
            <span class="error" id="passwordError"></span>

            <button type="submit" onclick="return validateForm()" class="button-submit">Iniciar sesión</button>
            <button type="reset" title="Presione para borrar la informaci&oacute;n" name="cancelar">Cancelar</button>
        </form>
    </div>
    <style>
        body {
            background-color: #9fabc5;
            color: #000;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .page-header h2 {
            color: #60543a;
        }
        .btn-primary {
            background-color: #60543a;
            border-color: #60543a;
        }
        .btn-primary:hover {
            background-color: #9fabc5;
            border-color: #9fabc5;
        }
        .form-group label {
            color: #60543a;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input {
            padding: 10px;
            border: 1px solid #60543a;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"],
        button[type="reset"] {
            background-color: #60543a;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
        }

        input[type="submit"]:hover,
        button[type="reset"]:hover {
            background-color: #4e4332;
        }

        .error {
            color: #ff6f61;
            font-size: 12px;
        }
    </style>
    <!---------------------------------------------------------------------------------->
    <?php
    include_once("footer.html");
    ?>
    </div>
</body>
</html>