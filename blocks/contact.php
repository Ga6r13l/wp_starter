<section class=" pt-0">
  <div class="container-fluid p-0 pb-md-4">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2445.3061047575197!2d22.248967115795672!3d52.20148457975516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471f5b4015d7866d%3A0xb80ca7857aee257!2sSoko%C5%82owska+161%2C+08-119+Strza%C5%82a!5e0!3m2!1spl!2spl!4v1545993450561" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
  </div>
  <div class="container">
    <div class="row my-4 mb-md-5">
      <div class="col-12 col-md-6 col-lg-5">


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


    </div>

    <div class="col-12 col-md-6 ml-auto pt-5 pt-md-0">
      <form>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" placeholder="Imie">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Nazwisko">
          </div>
        </div>

        <div class="row mt-4">
          <div class="col">
            <input type="email" class="form-control" placeholder="Wpisz email">
          </div>
        </div>

        <div class="row mt-4">
          <div class="col">
            <input type="email" class="form-control" placeholder="Temat">
          </div>
        </div>
        <div class="row mt-4">
          <div class="col">
            <textarea class="form-control" name="message" rows="3" placeholder="W czy możemy pomóc?"></textarea>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col">

            <p>Klikając przycisk "Wyślij wiadomość" wyrażasz zgodę na przetwarzanie swoich danych osobowych przez IPS Przedsiębiorstwo Informatyczne - Marcin Konopka z siedzibą w Siedlcach ul. Sokołowska 161 08-119 Siedlce w celu udzielania odpowiedzi na zgłoszenia zawarte w formularzu kontaktowym. </p>

            <p>Podanie danych jest dobrowolne, jednakże brak zgody uniemożliwia nam kontakt z Tobą. Zasady przetwarzania Twoich danych znajdziesz w POLITYCE PRYWATNOŚCI.</p>


            <button type="submit" class="btn ips-btn-a">Wyślij wiadomość</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</section>