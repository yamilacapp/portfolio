
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once ("PHPMailer/PHPMailer/src/SMTP.php");
include_once ("PHPMailer/PHPMailer/src/PHPMailer.php");

$pg="contacto"; 

$msg = "";

function guardarCorreo($correo)
{
    $archivo = fopen("mails.txt", "a+");
    fwrite($archivo, $correo . ";\n\r");
    fclose($archivo);
}

if ($_POST) { /* es postback */

    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $asunto = $_POST["txtAsunto"];
    $mensaje = $_POST["txtMensaje"];

    if ($nombre != "" && $correo != "") {
        guardarCorreo($correo);

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "mail.nelsontarche.com.ar"; // SMTP a utilizar. Por ej. mail.dominio.com.ar
        $mail->Username = "info@nelsontarche.com.ar"; // Correo completo a utilizar
        $mail->Password = "aqui va la clave de tu correo";
        $mail->Port = 25;
        $mail->From = "info@nelsontarche.com.ar"; // Desde donde enviamos (Para mostrar)
        $mail->FromName = "Nelson Daniel Tarche";
        $mail->IsHTML(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );

        //Destinatario
        $mail->addAddress($correo);
        //$mail->addBCC("nelson.tarche@gmail.com");
        $mail->Subject = "Contacto página web";
        $mail->Body = "Recibimos tu consulta, <br>te responderemos a la brevedad.";
        //  if(!$mail->Send()){
        //     $msg = "Error al enviar el correo, intente nuevamente mas tarde.";
        //   }
        $mail->ClearAllRecipients(); //Borra los destinatarios

        //Nosotros
        $mail->addAddress("nelson.tarche@gmail.com");
        $mail->Subject = "Recibiste un mensaje desde tu página web";
        $mail->Body = "Te escribió $nombre cuyo correo es $correo, con el asunto $asunto y el siguiente mensaje:<br><br>$mensaje";

        if ($mail->Send()) {
           //if(1==1){
            header('Location: confirmacion-envio.php');
        } else {
            $msg = "Error al enviar el correo, intente nuevamente mas tarde.";
        }
    } else {
        $msg = "Complete todos los campos";
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-5.13.1-web/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-5.13.1-web/css/fontawesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap">
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
        <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <header>
        <?php
            include_once("menu.php");
            ?>
    </header>
    <div class="container">
    <?php if (isset($msg) && $msg != ""): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
            <?php echo $msg; ?>
            </div>
        </div>
    </div>
    <?php endif;?>

        <div class="row">
            <div class="col-12">
                <section id="contacto">
                 
                                <div class="row">
                                    <div class="col-12 py-4">
                                        <h1>Trabajemos juntos!</h1>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h2 class="font-weight-bold">Para más detalles sobre mi
                                            trabajo podés ver mi Linkedin,
                                            descargar mi CV o mandarme
                                            un mensaje.
                                        </h2>
                                    </div>
                                </div>
                                <div class="row my-5">
                                    <div class="col-md-10 col-12">

                                        <form action="" method="POST">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="my-2 ">
                                                        <input type="text" placeholder="Nombre" name="txtNombre" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="my-2 ">
                                                        <input type="email" placeholder="Correo" name="txtCorreo" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="my-2 col-12">
                                                    <input type="text" placeholder="Asunto"   name="txtAsunto" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="my-2 col-12">
                                                    <textarea id="" class="form-control" name="txtMensaje"
                                                        placeholder="Mensaje"></textarea>
                                                </div>
                                            </div>
                                            <div class="my-2 submit">
                                                <button type="submit" value="Enviar" class="">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            
                </section>
            </div>
        </div>
    </div>
    <?php
    include_once("footer.php");
   ?>


    </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>

</html>