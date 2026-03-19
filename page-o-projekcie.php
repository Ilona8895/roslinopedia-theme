<?php get_header(); ?>

<?php while (have_posts()) {

  the_post();

  pageBanner();
  ?>

<section class="project-page">
<div class="container"> 



  <!-- OPIS -->
  <div class="project-page__section">

      <h2 class="project-page__title">Opis projektu</h2>
      <p>
        Roślinopedia to autorska platforma webowa umożliwiająca przeglądanie, filtrowanie
        i wyszukiwanie szczegółowych informacji o roślinach ogrodowych. Projekt został
        zaprojektowany jako skalowalna baza wiedzy z myślą o ogrodnikach-amatorach
        oraz osobach planujących nasadzenia.
      </p>
      <p>
        System wykorzystuje WordPress jako warstwę zarządzania treścią,
        natomiast logika aplikacji oraz interfejs użytkownika zostały
        zaprojektowane i zaimplementowane w autorskim motywie.
      </p>

  </div>

  <!-- CEL -->
  <div class="project-page__section">
    
      <h2 class="project-page__title">Cel projektu</h2>
      <p class="project-page__subtitle">
      Głównym celem projektu było zbudowanie rozszerzalnej platformy, w której użytkownicy mogą przeglądać i wyszukiwać informacje o roślinach, a także:
      </p>
      <ul class="project-page__list">
        <li class="project-page__list__item">przeglądać szczegółowe dane roślin</li>
        <li class="project-page__list__item">filtrować rośliny według taksonomii</li>
        <li class="project-page__list__item">dodawać prywatne notatki użytkownika</li>
        <li class="project-page__list__item">korzystać z wyszukiwarki opartej o REST API</li>
      </ul>
  
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
           Własny typ treści „roslina”, który przechowuje informacje o roślinach w uporządkowanej formie — nie jako zwykłe wpisy, ale jako dedykowane encje.
        </p>
      </article>

      <article class="project-page__card">
        <div class="project-page__card__icon">🗂️</div>
        <h3>Taksonomie i filtrowanie</h3>
        <p>
        Każda roślina jest opisana i pogrupowana za pomocą taksonomii takich jak:

          typ rośliny,

          stanowisko,

          rodzaj gleby,

          oraz dodatkowych pól ACF:

          okres kwitnienia,

          wysokość,

          podlewanie,

          mrozoodporność,

    
        </p>
      </article>

      <article class="project-page__card">
        <div class="project-page__card__icon">🔎</div>
        <h3>Własne REST API + wyszukiwarka</h3>
        <p>
        Własne endpointy REST API oraz front-endowy mechanizm JS, który pobiera i filtruje dane dynamicznie bez przeładowania strony.
        </p>
      </article>

      <article class="project-page__card">
        <div class="project-page__card__icon">📝</div>
        <h3>Prywatne notatki użytkownika</h3>
        <p>
        System notatek, który pozwala zalogowanym użytkownikom dodawać swoje obserwacje i komentarze do poszczególnych roślin — w sposób prywatny i bezpieczny. Notatki jako osobny typ treści.


        </p>
      </article>

      <article class="project-page__card">
        <div class="project-page__card__icon">🌙</div>
        <h3>Dark Mode — własna wtyczka</h3>
        <p>
         Wtyczka, która umożliwia użytkownikom zmianę motywu kolorystycznego. Funkcjonalności:

        domyślny Dark Mode z kolorami dopasowymi do Roślinopedia theme,

        pamięć w local storage,

        możliwość wyboru własnej kolorystyki,

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



  <!-- CTA -->
  <div class="project-page__section">

      <h2 class="project-page__title">Zobacz kod źródłowy</h2>
      <div class="project-page__cta">
        <i class="fa-brands fa-github"></i>
        <a href="https://github.com/Ilona8895/roslinopedia-theme" class="btn btn--primary btn--large">Roślinopedia theme</a>
        <a href="https://github.com/Ilona8895/dark-mode-plugin" class="btn btn--primary btn--large">Dark Mode Plugin</a>
      </div>

  </div>

  </div>
</section>

<?php
} ?>

<?php get_footer(); ?>
