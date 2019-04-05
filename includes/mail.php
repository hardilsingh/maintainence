<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader

require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer;

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hardilsingh87@gmail.com';                     // SMTP username
    $mail->Password   = 'Indiaisgreat1';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );                                   // TCP port to connect to

    //Recipients
    $mail->setFrom('hardilsingh87@gmail.com', 'Maintainence');
    $mail->addAddress($email, $name);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = '
    <table bgcolor="#ffffff" width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent"
        align="center" style="font-family:Helvetica, Arial,serif;">
        <tbody>
          <tr>
            <td>
              <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff"
                class="MainContainer">
                <tbody>
                  <tr>
                    <td>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td valign="top" width="40">&nbsp;</td>
                            <td>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                  <!-- =============================== Header ====================================== -->
                                  <tr>
                                    <td height="75" class="spechide"></td>

                                    <!-- =============================== Body ====================================== -->
                                  </tr>
                                  <tr>
                                    <td class="movableContentContainer " valign="top">
                                      <div class="movableContent"
                                        style="border: 0px; padding-top: 0px; position: relative;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="35"></td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tbody>
                                                    <tr>
                                                      <td valign="top" align="center" class="specbundle">
                                                        <div class="contentEditableContainer contentTextEditable">
                                                          <div class="contentEditable">
                                                            <p
                                                              style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#222222;">
                                                              <span class="specbundle2"><span class="font1">Welcome
                                                                  to&nbsp;</span></span></p>
                                                          </div>
                                                        </div>
                                                      </td>
                                                      <td valign="top" class="specbundle">
                                                        <div class="contentEditableContainer contentTextEditable">
                                                          <div class="contentEditable">
                                                            <p
                                                              style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#69C374;">
                                                              <span class="font">PB06.online</span> </p>
                                                          </div>
                                                        </div>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <div class="movableContent"
                                        style="border: 0px; padding-top: 0px; position: relative;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                          <tr>
                                            <td valign="top" align="center">
                                              <div class="contentEditableContainer contentImageEditable">
                                                <div class="contentEditable">
                                                  <img src="images/line.png" width="251" height="43" alt=""
                                                    data-default="placeholder" data-max-width="560">
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                        </table>
                                      </div>
                                      <div class="movableContent"
                                        style="border: 0px; padding-top: 0px; position: relative;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                          <tr>
                                            <td height="55"></td>
                                          </tr>
                                          <tr>
                                            <td align="left">
                                              <div class="contentEditableContainer contentTextEditable">
                                                <div class="contentEditable" align="center">
                                                  <h2>Your OTP is: ' . $otp . '</h2>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>

                                          <tr>
                                            <td height="15"> </td>
                                          </tr>

                                          <tr>
                                            <td align="left">
                                              <div class="contentEditableContainer contentTextEditable">
                                                <div class="contentEditable" align="center">
                                                  <p>
                                                    Here’s what you can say: Thanks again for signing up
                                                     for our services. You’re all set up, and will be getting the emails once
                                                    per week. Meanwhile, you can check out our <a target="_blank"
                                                      href="pb06.online/services.php" class="link1">Services</a> section to get the most
                                                    out of your new account.
                                                    <br>
                                                    <br>
                                                    Have questions? Get in touch with us via Facebook or Twitter, or
                                                    email our support team.
                                                    <br>
                                                    <br>
                                                    Cheers,
                                                    <br>
                                                    <span style="color:#222222;">Hardil Singh</span>
                                                  </p>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>

                                          <tr>
                                            <td height="55"></td>
                                          </tr>

                                          <tr>
                                            <td align="center">
                                              <table>
                                                <tr>
                                                  <td align="center" bgcolor="#1A54BA"
                                                    style="background:#69C374; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
                                                    <div class="contentEditableContainer contentTextEditable">
                                                      <div class="contentEditable" align="center">
                                                        <a target="_blank" href="#" class="link2"
                                                      </div>
                                                    </div>
                                                  </td>
                                                </tr>
                                              </table>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td height="20"></td>
                                          </tr>
                                        </table>
                                      </div>
                                      <div class="movableContent"
                                        style="border: 0px; padding-top: 0px; position: relative;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="65">
                                            </tr>
                                            <tr>
                                              <td style="border-bottom:1px solid #DDDDDD;"></td>
                                            </tr>
                                            <tr>
                                              <td height="25"></td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tbody>
                                                    <tr>
                                                      <td valign="top" class="specbundle">
                                                        <div class="contentEditableContainer contentTextEditable">
                                                          <div class="contentEditable" align="center">
                                                            <p
                                                              style="text-align:left;color:#CCCCCC;font-size:12px;font-weight:normal;line-height:20px;">
                                                              <span
                                                                style="font-weight:bold;">[CLIENTS.COMPANY_NAME]</span>
                                                              <br>
                                                              
                                                              <br>
                                                              <a target="_blank" href="[FORWARD]">Forward to a
                                                                friend</a><br>
                                                              <a target="_blank" class="link1" class="color:#382F2E;"
                                                                href="[UNSUBSCRIBE]">Unsubscribe</a>
                                                              <br>
                                                              <a target="_blank" class="link1" class="color:#382F2E;"
                                                                href="[SHOWEMAIL]">Show this email in your browser</a>
                                                            </p>
                                                          </div>
                                                        </div>
                                                      </td>
                                                      <td valign="top" width="30" class="specbundle">&nbsp;</td>
                                                      <td valign="top" class="specbundle">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tbody>
                                                            <tr>
                                                              <td valign="top" width="52">
                                                                <div
                                                                  class="contentEditableContainer contentFacebookEditable">
                                                                  <div class="contentEditable">
                                                                    <a target="_blank" href="#"><img
                                                                        src="images/facebook.png" width="52" height="53"
                                                                        alt="facebook icon" data-default="placeholder"
                                                                        data-max-width="52" data-customIcon="true"></a>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                              <td valign="top" width="16">&nbsp;</td>
                                                              <td valign="top" width="52">
                                                                <div
                                                                  class="contentEditableContainer contentTwitterEditable">
                                                                  <div class="contentEditable">
                                                                    <a target="_blank" href="#"><img
                                                                        src="images/twitter.png" width="52" height="53"
                                                                        alt="twitter icon" data-default="placeholder"
                                                                        data-max-width="52" data-customIcon="true"></a>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td height="88"></td>
                                            </tr>
                                          </tbody>
                                        </table>

                                      </div>

                                      <!-- =============================== footer ====================================== -->

                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td valign="top" width="40">&nbsp;</td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>';
    $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}