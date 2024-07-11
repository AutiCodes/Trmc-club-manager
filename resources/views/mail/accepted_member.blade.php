<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>

  <body>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    <tr>
      <td align="center" style="padding: 20px;" >
        <table class="content" width="600" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid #cccccc;">
          <!-- Header -->
          <tr>
            <td class="header" style=" text-align: center; color: black; font-size: 34px;">
                <img src="{{ URL::asset('/media/images/TRMC_LOGO.png') }}" width="120" height="120" style="padding-top: 20px;"></img><br>
                Twentse Radio Modelvlieg Club
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="body" style="padding: 40px; text-align: left; font-size: 18px; line-height: 1.6;">
              <p>
                Beste {{ $name }},
                <br>
                <br>
                je bent nu lid van de T.R.M.C, gefeliciteed!
                <br>
                <br>
                U kunt nu ook gebruik gebruik maken van aspirant leden / leden functionaliteiten:
                - Inloggen op <a href="https://trmc.nl">trmc.nl</a> om extra content te bekijken.
                - Vluchten aanmelden in de club manager: <a href="https://club.trmc.nl/aanmeld-formulier">vlucht aanmelden</a> 
                <br>
                De login gegevens van <a href="https://trmc.nl">trmc.nl</a> zijn:
                - <strong>Email:</strong> {{ $email }}
                - <strong>Wachtwoord:</strong> {{ $password }}

                Het bestuur van T.R.M.C wenst u veel vlieg plezier!
              </p>
            </td>
          </tr>

            <tr>
              <td class="body" style="text-align: center; font-size: 16px; line-height: 1.6;"">
                Dit is een geautomatiseerd bericht. Neem contact op met de TRMC voor vragen.
              </td>
            </tr>

            <!-- Footer -->
            <tr>
              <td class="footer" style="padding: 40px; text-align: center; color: rgb(0, 0, 0); font-size: 18px;">
                Copyright &copy; 2024 <a href="https://trmc.nl">TRMC</a>
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