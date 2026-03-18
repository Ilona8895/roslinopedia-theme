<?php get_header(); ?>

<?php while (have_posts()) {

  the_post();

  pageBanner();
  ?>

<section class="project-page">
<div class="container"> 


  <div class="project-page__section">
    <?php the_content(); ?>
  </div>



  <div class="project-page__section">

    <h2 class="project-page__title">Kluczowe funkcjonalności</h2>
    <p class="project-page__subtitle">
      Najważniejsze możliwości platformy zaprojektowane z myślą o wygodnym
      przeglądaniu i zarządzaniu bazą roślin.
    </p>

    <div class="project-page__grid">

      <article class="project-page__card">
        <div class="project-page__card__icon">🌿</div>
        <h3>Custom Post Type</h3>
        <p>
          Utworzony został własny typ treści „roslina”, który agreguje informacje o roślinach w uporządkowanej formie — nie jako zwykłe wpisy, ale jako dedykowane encje.
        </p>
      </article>

      <article class="project-page__card">
        <div class="project-page__card__icon">🗂️</div>
        <h3>Taksonomie i filtrowanie</h3>
        <p>
        Każda roślina jest opisana i pogrupowana za pomocą taksonomii takich jak:

          typ rośliny

          stanowisko

          rodzaj gleby

          oraz dodatkowych pól ACF, np.:

          okres kwitnienia

          wysokość

          podlewanie

          mrozoodporność

          Dzięki temu treść jest strukturalna i łatwa do przeszukiwania.
        </p>
      </article>

      <article class="project-page__card">
        <div class="project-page__card__icon">🔎</div>
        <h3>Własne REST API + wyszukiwarka</h3>
        <p>
        Aby umożliwić szybkie wyszukiwanie roślin z warunkami filtrów, zbudowałam własne endpointy REST API oraz front-endowy mechanizm JS, który pobiera i filtruje dane dynamicznie bez przeładowania strony.
        </p>
      </article>

      <article class="project-page__card">
        <div class="project-page__card__icon">📝</div>
        <h3>Prywatne notatki użytkownika</h3>
        <p>
        Projekt przewiduje również system notatek, który pozwala zalogowanym użytkownikom dodawać swoje obserwacje i komentarze do poszczególnych roślin — w sposób prywatny i bezpieczny. Notatki jako osobny typ treści.


        </p>
      </article>

      <article class="project-page__card">
        <div class="project-page__card__icon">🌙</div>
        <h3>Dark Mode — własna wtyczka</h3>
        <p>
        Utworzony został Dark Mode Plugin - osobna wtyczkę, która umożliwia użytkownikom zmianę motywu kolorystycznego. Dzięki temu projekt posiada:

        domyślny Dark Mode z kolorami dopasowymi do Roślinopedia

        pamięć w local storage

        możliwość wyboru własnej kolorystyki

        możliwość zmiany położenia ikony Dark Mode
        </p>
      </article>

      <article class="project-page__card">
        <div class="project-page__card__icon">⚡</div>
        <h3>Responsywność i UX</h3>
        <p>
        Strona została zaprojektowana z myślą o urządzeniach mobilnych — układ dostosowuje się do ekranów tabletów i smartfonów, a menu i widoki działają płynnie w każdym rozmiarze.
        </p>
      </article>

    </div>
  </div>



  <div class="project-page__section">
    <h2 class="project-page__title">Technologie użyte w projekcie</h2>
    <p class="project-page__subtitle">
      Projekt został zbudowany z użyciem następujących technologii:
    </p>

    <div class="project-page__grid">
        <div class="project-page__tech">
          <img src="<?= get_template_directory_uri() ?>/images/php.svg" alt="">
          <span>PHP</span>
        </div>
        <div class="project-page__tech" >
          <img src="<?= get_template_directory_uri() ?>/images/javascript.svg" alt="">
          <span>JavaScript</span>
        </div>
        <div class="project-page__tech">
            <img src="<?= get_template_directory_uri() ?>/images/rest-api.svg" alt="">
            <span>REST API</span>
        </div>
        <div class="project-page__tech">
            <img src="<?= get_template_directory_uri() ?>/images/wordpress.svg" alt="">
            <span>WordPress</span>
        </div>
        <div class="project-page__tech">
            <img src="<?= get_template_directory_uri() ?>/images/scss.svg" alt="">
            <span>SCSS</span>
        </div>
        <div class="project-page__tech">
            <img src="<?= get_template_directory_uri() ?>/images/acf.svg" alt="">
            <span>ACF</span>
        </div>
    </div>


  </div>


  </div>
</section>

<?php
} ?>

<?php get_footer(); ?>
