<?php
include_once("header.html");
?>

<body>
    <?php
    include_once("menu.php");
    ?>

    <!-------------------------contenido--------------------------------->
    <script>
        function validateForm()
        {
            var valido = true;

            var id = document.getElementById("id").value;
            if(!/^\d{9,15}$/.test(id)){
                document.getElementById("idError").innerText="Identificación inválida, debe ser entre 9 a 15 dígitos";
                valido = false;
            }else{
                document.getElementById("idError").innerText="Identificación ingresada correctamente";
            }

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

            var password2 = document.getElementById("password2").value;
            if(password2 != password){
                document.getElementById("password2Error").innerText="Las contraseñas deben coincidir";
                valido = false;
            }else{
                document.getElementById("password2Error").innerText="Contraseña ingresada correctamente";
            }

            var apellido1 = document.getElementById("apellido1").value;
            if(!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(apellido1)){
                document.getElementById("apellido1Error").innerText="Primer apellido inválido, no puede contener números";
                valido = false;
            }else{
                document.getElementById("apellido1Error").innerText="Primer apellido ingresado correctamente";
            }

            var apellido2 = document.getElementById("apellido2").value;
            if(!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(apellido2)){
                document.getElementById("apellido2Error").innerText="Segundo apellido inválido, no puede contener números";
                valido = false;
            }else{
                document.getElementById("apellido2Error").innerText="Segundo apellido ingresado correctamente";
            }

            var correo = document.getElementById("correo").value;
            if(!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(correo)){
                document.getElementById("correoError").innerText="Formato del correo inválido";
                valido = false;
            }else{
                document.getElementById("correoError").innerText="Correo ingresado correctamente";
            }

            var telefono = document.getElementById("telefono").value;
            if(!/^\d{8}$/.test(telefono)){
                document.getElementById("telefonoError").innerText="Teléfono inválido. El formato debe ser ####-####";
                valido = false;
            }else{
                document.getElementById("telefonoError").innerText="Teléfono ingresado correctamente";
            }

            return valido;
        }
    </script>
    
    <div class="container">
    <h1>Registrarse</h1>
        <form name="registro" action="conexion.php" method="post">
            <label for="id">Identificaci&oacute;n: </label>
            <input type="number" name="id" placeholder="Digite su n&uacute;mero de identificaci&oacute;n" required>
            <span class="error" id="idError"></span>

            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" placeholder="Cree un nombre de usuario" required>
            <span class="error" id="usuarioError"></span>

            <label for="password">Contrase&ntilde;a: </label>
            <input type="password" name="password" placeholder="Digite su contraseña" required>
            <span class="error" id="passwordError"></span>

            <label for="password2">Contrase&ntilde;a: </label>
            <input type="password" name="password2" placeholder="Confirme su contrase&ntilde;a" required>
            <span class="error" id="password2Error"></span>

            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
            <span class="error" id="nombreError"></span>

            <label for="apellido1">Primer apellido: </label>
            <input type="text" name="apellido1" placeholder="Ingrese su primer apellido" required>
            <span class="error" id="apellido1Error"></span>

            <label for="apellido2">Segundo apellido: </label>
            <input type="text" name="apellido2" placeholder="Ingrese su segundo apellido" required>
            <span class="error" id="apellido2Error"></span>

            <label for="correo">Correo electr&oacute;nico: </label>
            <input type="email" name="correo" placeholder="Inregese su correo electr&oacute;nico" required>
            <span class="error" id="correoError"></span>

            <label for="telefono">N&uacute;mero telef&oacute;nico: </label>
            <input type="pattern" name="telefono" placeholder="Ingrese su n&uacute;mero de tel&eacute;fono" required>
            <span class="error" id="telefonoError"></span>

            <button type="submit" onclick="return validateForm()">Registrarse</button>
            <button type="reset" title="Presione para borrar la informaci&oacute;n" name="cancelar">Cancelar</button>
        </form>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9fabc5;
            color: #000;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #60543a;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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