<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>

  <body>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" style="padding: 20px;">
        <table class="content" width="600" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid #cccccc;">
          <!-- Header -->
          <tr>
            <td class="header" style="background-color: #345C72; padding: 40px; text-align: center; color: white; font-size: 24px;">
              Welkom bij TRMC!
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
            Beste {{ $name }},<br>
            Je bent zojuist toegevoegd aan de Twentse Radio Modelvlieg Club als {{ $club_status }}!
            <br><br>
             Je hebt logingegevens gekregen om in te loggen op <a href="https://trmc.nl">trmc.nl</a>:<br><br>
             <strong>Gebruikersnaam:</strong> {{ $username }}<br>
             <strong>Wachtwoord:</strong> {{ $password }}<br>
             <small style="color: red">Wijzig je wachtwoord direct!</small><br><br>

             We wensen je veel plezier toe als lid van TRMC!
            </td>
          </tr>

            <!-- Call to action Button -->
            <tr>
              <td style="padding: 0px 40px 0px 40px; text-align: center;">
                <!-- CTA Button -->
                <table cellspacing="0" cellpadding="0" style="margin: auto;">
                  <tr>
                    <td align="center" style="background-color: #345C72; padding: 10px 20px; border-radius: 5px;">
                      <a href="https://trmc.nl" target="_blank" style="color: #ffffff; text-decoration: none; font-weight: bold;">Ga naar trmc.nl</a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>

            <tr>
              <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                Dit is een geautomatiseerd bericht. Neem contact op met de TRMC voor vragen.
              </td>
            </tr>

            <!-- Footer -->
            <tr>
              <td class="footer" style="background-color: #333333; padding: 40px; text-align: center; color: white; font-size: 14px;">
                Copyright &copy; {{ date('Y')}} TRMC.nl
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <style>
      @media screen and (max-width: 600px) {
        .content {
            width: 100% !important;
            display: block !important;
            padding: 10px !important;
        }
        .header, .body, .footer {
            padding: 20px !important;
        }
      }
    </style>
  </body>
</html>