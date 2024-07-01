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
              Twentse Radio Modelvlieg Club
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
              Beste {{ $name }},
              <br>
              <br>
              Je club status is gewijzigd.
              <br>
              <br>
              <strong>Oude status:</strong>
              @switch ($oldClubStatus)
                @case (6)
                  Junior lid
                  @break
                @case (1)
                  Aspirant lid
                  @break
                @case (2)
                  Lid
                  @break
                @case (3)
                  Bestuur
                  @break                
                @case (5)
                  Donateur
                  @break
              @endswitch
              <br>
              <strong>Nieuwe status:</strong>
              @switch ($newClubStatus)
                @case (6)
                  Junior lid
                  @break
                @case (1)
                  Aspirant lid
                  @break
                @case (2)
                  Lid
                  @break
                @case (3)
                  Bestuur
                  @break                
                @case (5)
                  Donateur
                  @break
              @endswitch
              <br><br>
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