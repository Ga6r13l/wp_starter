
<?php
if(isset($_POST['buy']) && $_POST['buy'] == 1){

  $cena = get_field('cena');
  $liczbaLicencji = empty($_POST['licencja']) ?  1 : (int) $_POST['licencja'];


  $liczbaLicencji =  is_numeric( $liczbaLicencji) && is_int($liczbaLicencji) ?  $liczbaLicencji : 1;
  $liczbaLicencji = $liczbaLicencji < 1 ? 1 : $liczbaLicencji;
  $liczbaLicencji = $liczbaLicencji > get_field('max') ? get_field('max') : $liczbaLicencji;



  $cenaOstateczna = $cena * $liczbaLicencji;
  $nazwa = get_field('nazwa_sprzedazowa');
  $podatek = 23;
  $wartoscZamowieniaNetto = $cena * $liczbaLicencji;
  $wartoscZamowieniaBrutto = $wartoscZamowieniaNetto + ($wartoscZamowieniaNetto * ($podatek/100));

//url skryptu wpisującego do bazy
  $url = 'https://ips-infor.com.pl/external/zakup.php';
//treść zamówienia - tam gdzie zmienna_coś_tam_coś  prosze wstawić właściwe wartości
  $co = $nazwa ."\r\n";
  $co.='sztuk: '. $liczbaLicencji ."\r\n";
  $co.='netto jednostkowa '. $cena .' brutto całość '. $wartoscZamowieniaBrutto ."\r\n\r\n";

  // $co.='zmienna_produkt_2_nazwa'."\r\n";
  // $co.='sztuk: '.'zmienna_ilość_sztuk_2'."\r\n";
  // $co.='netto jednostkowa '.'zmienna_cena_2'.' brutto całość '.'zmienna_brutto_calosc_2'."\r\n\r\n";

  $co.="\r\nRazem: ". $wartoscZamowieniaBrutto;

//Wartość zamówienia - oczwiście wartość właściwą trzeba wstawić 
  $ile = $wartoscZamowieniaBrutto;
//Ogsługa połaczenia
  $myvars=array('tresc'=>$co,'wartosc'=>$ile);
  $ch = curl_init( $url );
  curl_setopt( $ch, CURLOPT_POST, 1);
  curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt( $ch, CURLOPT_HEADER, 0);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
//W razie sukcesu do $response będzie zwrócony numer, w innym razie albo opis błedu przy błędzie połącznia albo puste wynik przy błedach w zapytaniu
  $response = curl_exec( $ch );
// no tu wypisanie na ekran
  $zamowienie = $response;

  $kasaGrosze = $wartoscZamowieniaBrutto * 100;

}
?>




<section class=" pt-0">

  <div class="container">
    <div class="row my-4 mb-md-5">
      <div class="col-12 col-md-12 col-lg-12">


        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

          <!-- article -->
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!-- page title -->
            <h1 class="h2 bg-secoundary"><?php the_title(); ?></h1>

            <?php the_content(); ?>

            <br class="clear">

            <?php edit_post_link(); ?>

          </article>
          <!-- /article -->

        <?php endwhile; ?>


      <?php endif; ?>


      <h2>Podsumowanie zamówienia (<?php echo $zamowienie ?>)</h2>

      <table class="table table-bordered">
       <tr class=" bg-primary text-white">
        <th>Nazwa programu</th>
        <th>Liczba licencji </th>
        <th>Cena jednostkowa (NETTO)</th>
        <th>Wartość zamówienia (BRUTTO)</th>
      </tr> 
      <tr class="bg-white">
        <td><?php echo $nazwa ?></td>
        <td><?php echo $liczbaLicencji ?> </td>
        <td><?php echo $cena ?>zł</td>
        <td><?php echo $wartoscZamowieniaBrutto ?>zł</td>
      </tr> 
    </table>



    <form action="http://sklep.przelewy24.pl/zakup.php" method="post">

     <label>
      <input type="checkbox" name="z24_zgoda" value="1" required >
      <small>Potwierdzam, że zapoznałem się z Regulaminem oraz Polityką prywatności i akceptuję je oraz wyrażam zgodę na przetwarzanie danych identyfikacyjnych przez firmę IPS Przedsiębiorstwo Informatyczne Marcin Konopka w celu realizacji zamówienia.</small>
    </label>

    <input type="hidden" name="phpMyAdmin" value="2%2CPPwSsigN9uPXbs2sNaMafbbU1">
    <input type="hidden" name="z24_id_sprzedawcy" value="2235">
    <input type="hidden" name="z24_return_url" value="http://ips-infor.com.pl/"> 
    <input type="hidden" name="z24_language" value="pl"> 
    <input type="hidden" name="z24_crc" value="b403a7a4"> 
    <input type="hidden" name="z24_nazwa" value="Zamowienie nr <?php echo $zamowienie ?>"> 
    <input type="hidden" name="z24_kwota"  value="<?php echo  $kasaGrosze; ?>"> 

    <div class="text-center w-100">

     <input class="btn ips-btn-c ips-radius-0" type="submit" value="Zamawiam z obowiązkiem zapłaty (Przelewy24.pl)">

   </div>

 </form>



</div>


</div>
</div>
</section>