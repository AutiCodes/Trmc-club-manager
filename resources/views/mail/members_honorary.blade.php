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
              @if ($type == 'erelid')
                Je bent een erelid van Twentse Radio Modelvlieg Club geworden!
              @else
                Je bent geen erelid meer van de Twentse Radio Modelvlieg Club!
              @endif
              <br>
              <br>
            </td>
          </tr>


            <tr>
              <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                Dit is een geautomatiseerd bericht. Neem contact op met TRMC voor vragen.
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