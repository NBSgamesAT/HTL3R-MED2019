<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kalendar</title>
  </head>
  <body>
    <?php
      $monthNames = Array("Jänner", "Februar", "März", "April", "Mai", "Juni", "Juli",
      "August", "September", "Oktober", "November", "December");

      if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
      if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

      $cMonth = $_REQUEST["month"];
      $cYear = $_REQUEST["year"];

      $prev_year = $cYear;
      $next_year = $cYear;
      $prev_month = $cMonth-1;
      $next_month = $cMonth+1;

      if ($prev_month == 0 ) {
          $prev_month = 12;
          $prev_year = $cYear - 1;
      }
      if ($next_month == 13 ) {
          $next_month = 1;
          $next_year = $cYear + 1;
      }

    ?>
    <table width="200" bgcolor="#eee">
    <tr align="center">
    <td bgcolor="#f2afb9" style="color:#FFFFFF">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">

    </table>
    </td>
    </tr>
    <tr>
    <td align="center">
    <table width="100%" border="2" cellpadding="2" cellspacing="2">
    <tr align="center">
      <td width="50%" align="left" bgcolor="#f2afb9"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF"> < </a></td>
      <td colspan="7" bgcolor="#f2afb9" style="color:#FFFFFF"><strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
      <td width="50%" align="right" bgcolor="#f2afb9"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF"> > </a>  </td>

    </tr>
    <tr>
    <td align="center" bgcolor="#ddd" style="color:#888888"><strong>Montag</strong></td>
    <td align="center" bgcolor="#ddd" style="color:#888888"><strong>Dienstag</strong></td>
    <td align="center" bgcolor="#ddd" style="color:#888888"><strong>Mittwoch</strong></td>
    <td align="center" bgcolor="#ddd" style="color:#888888"><strong>Donnerstag</strong></td>
    <td align="center" bgcolor="#ddd" style="color:#888888"><strong>Freitag</strong></td>
    <td align="center" bgcolor="#ddd" style="color:#888888"><strong>Samstag</strong></td>
    <td align="center" bgcolor="#ddd" style="color:#888888"><strong>Sonntag</strong></td>
    </tr>
    <?php
    $timestamp = mktime(0,0,0,$cMonth,1,$cYear);
    $maxday = date("t",$timestamp);
    $thismonth = getdate ($timestamp);
    $startday = $thismonth['wday'];
    for ($i=0; $i<($maxday+$startday); $i++) {
        if(($i % 7) == 0 ) echo "<tr>";
        if($i < $startday) echo "<td></td>";
        else echo "<td align='center' valign='middle' height='20px'>". ($i - $startday + 1) . "</td>";
        if(($i % 7) == 6 ) echo "</tr>";
    }
    ?>
  </table>
  </td>
  </tr>
  </table>
  </body>
</html>
