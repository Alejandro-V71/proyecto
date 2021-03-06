<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, td, div, h1, p {
          font-family: Arial, sans-serif;
        }
        @media screen and (max-width: 530px) {
          .unsub {
            display: block;
            padding: 8px;
            margin-top: 14px;
            border-radius: 6px;
            background-color: #555555;
            text-decoration: none !important;
            font-weight: bold;
          }
          .col-lge {
            max-width: 100% !important;
          }
        }
        @media screen and (min-width: 531px) {
          .col-sml {
            max-width: 27% !important;
          }
          .col-lge {
            max-width: 73% !important;
          }
        }
      </style>
    </head>
    <body style="margin:0;padding:0;word-spacing:normal;">
      <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">
        <table role="presentation" style="width:100%;border:none;border-spacing:0;">
          <tr>
            <td align="center" style="padding:0;">
              <!--[if mso]>
              <table role="presentation" align="center" style="width:600px;">
              <tr>
              <td>
              <![endif]-->
              <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                <tr>
                  <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                    <a href="http://www.example.com/" style="text-decoration:none;"><img src="{{asset('inciosesion/img/logoFinal.png')}}" width="165" alt="Logo" style="width:80%;max-width:165px;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
                  </td>
                </tr>
                <tr>
                  <td style="padding:30px;background-color:#ffffff;">
                    <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em; color:#E75731;">Confirmaci??n de Solicitud</h1>
                    <p style="margin:0;">Tenga en cuenta lo siguiente: </p>
                    <p>
                        ???	El cliente tiene la obligaci??n de llevar la motocicleta lavada<br>
                        ???	El cliente debe proporcionar la tarjeta de propiedad de la motocicleta<br>
                        ???	No se da garant??a si el cliente lleva la motocicleta a otro establecimiento donde se brinde los mismos servicios ya que pueden alterar el trabajo realizado en nuestro taller
                        ???	No se brinda garant??a si el cliente trae repuestos gen??ricos ya que afecta la calidad del trabajo realizado<br>
                        ???	Al decidir a hacer el mantenimiento el cliente debe de pagar el 50% del costo total.<br>
                        ???	Expedir los reportes con datos que describan el proceso realizado durante el mantenimiento o reparaci??n con informaci??n correcta y ver??dica. En caso de no ser as?? se realiza un fraude por parte de la empresa.<br>
                        ???	Todos los datos ingresados al sistema deben ser verdaderos y se confirmar??n los datos correspondientes.<br>

                    </p>
                    <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em; color:#E75731;">Informaci??n de la solcitud</h1>
                    <p >Titulo de solicitud : <span style="color:#E75731;">{{$titulo}}</span></p>
                    <p >Hora : <span style="color:#E75731;">{{$hora}}</span></p>
                    <p>Fecha : <span style="color:#E75731;">{{$fecha}}</span></p>


                  </td>
                </tr>



                <tr>
                    <td style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">

                      <p style="margin:0;font-size:14px;line-height:20px;">&reg; Todos los derechos reservados</p>
                    </td>
                  </tr>

              </table>
              <!--[if mso]>
              </td>
              </tr>
              </table>
              <![endif]-->
            </td>
          </tr>
        </table>
      </div>
    </body>
</html>
