<?php
    // include('./database.php');

    function listaemail(){
        include('./database.php');
        $sql="SELECT * FROM `usuarios`";
        return $result=$mysqli->query($sql);
    }
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    //Instantiation and passing `true` enables exceptions

    // function enviarmensaje(){

    $mail = new PHPMailer(true);
    // Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lacamiontaexpress@gmail.com';                     //SMTP username
    $mail->Password   = 'prueba12345';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('lacamiontaexpress@gmail.com', 'LaCamiontaExpress');

    $query = listaemail();
    while ($row = $query->fetch_assoc()) {
        $emailr = $row['email'];
        $mail->addAddress($emailr);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = '¿Compraste tu ticket?';
        $mail->Body = '¡Recuerda comprar tu ticket de hoy en LaCamiontaExpress!';
        $mail->send();

        if($mail->send()){
            continue;
        }
        
    }
    header('location:estados_viajes.php');
    
?>