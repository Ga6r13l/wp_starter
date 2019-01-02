

<section class="sell py-4 py-xl-5" id="buy_now">
  <div class="container">



    <div class="card ips-card-b ips-radius-1" >


      <div class="card-header text-center">
       Zamów teraz PITy IPS 
     </div>

     <div class="card-body bg-white">



      <div class="row">

        <div class="col-md-4">
          <img src="<?php echo get_template_directory_uri()?>/public/logo_ips.svg" class="js-anime delay-1s slower" data-animation="tada">
        </div>

        <div class="col-md-8">

          <h2 class="text-secondary">Podnieś księgowość na wyższy poziom</h2>

          <ul>
            <li>Ponad 20 lat tworzenia programów do PIT</li>
            <li>Profesjonalna obsługa</li>
            <li>Szybka realizacja zamówienia</li>
            <li>Bezpieczna płatność, przelewy 24</li>
          </ul>

          <div class="row">


            <div class="col-lg-6">
              <form action="<?php echo get_permalink(24)?>" method="post">
               <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text" id="btnGroupAddon">Liczba licencji</div>
                </div>
                <input  id="licencja"  class="form-control"  value="1" type="number" name="licencja" aria-describedby="btnGroupAddon">
              </div>

              <div class="h2 font-weight-bold text-center"><span id="koszt" ><?php echo get_field('cena', 24) + (get_field('cena', 24) * 0.23) ?> </span> zł z VAT </div>
              <button class="btn ips-btn-c ips-radius-0" type="submit" name="buy" value="1">Przejdź do podsumowania</button>
            </form>
          </div>

        </div>



        <br>


      </div>


    </div>

  </div>



</div>
</div>



</section>  
