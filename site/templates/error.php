<? snippet('header') ?>
<? snippet('sidebar') ?>

<!-- 4 Error
- - - - - - - - - - - - - - - - - - - - - -->

<main class="M trns-250">
  <article class="error pub">

<!-- 4.1 Header -->

    <header class=pub-H>
      <h1 class=pub-H-title><? echo $site->contentErrorTitle() ?></h1>
    </header>

<!-- 4.2 Body -->

    <section class=pub-B>
      <? echo $site->contentErrorText()->kt() ?>
    </section>
  </article>
</main>

<? snippet('footer'); ?>