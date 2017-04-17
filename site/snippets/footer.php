<!-- 5 Footer
- - - - - - - - - - - - - - - - - - - - - -->

<footer class="F trns-250">

<!-- 5.1 Menu -->

  <nav class=F-nav>
    <ul class=F-nav-lst>
      <? if($site->find('pages') == true ): ?>
        <li class=F-nav-lst-li>
          <a class="<? if($page->isHomePage()): ?>active<? endif ?>" href="<? echo $site->url() ?>" title=Home>Home</a>
        </li>
        <? foreach($site->find('pages')->children()->visible() as $page): ?>
          <li class=F-nav-lst-li>
            <a class="<? e($page->isOpen(), 'active') ?>" href="<? echo $page->url() ?>"><? echo $page->title()->html() ?></a>
          </li>
        <? endforeach ?>
      <? else: ?>
        <li class=F-nav-lst-li>
          <a class="active<? if($page->isHomePage()): ?><? endif ?>" href="<? echo $site->url() ?>">Return to Home</a>
        </li>
      <? endif ?>
    </ul>
  </nav>

<!-- 5.2 Logo -->

  <? if($site->logo()->isNotEmpty()): ?>
  <section class=F-logo>
    <img alt="Website logo" src="<? echo $site->logo()->toFile()->url() ?>">
  </section>
  <? endif ?>

<!-- 5.3 Location -->

  <? if($site->location()->isNotEmpty()): ?>
  <section class=F-area>
    <? echo $site->location()->area()->kt() ?>
  </section>
  <? endif ?>

<!-- 5.4 Copyright -->

  <? if( $site->copyright() == 'true'): ?>
  <section class=F-copy>
    <p>&copy; <? echo date("Y") . '. ' . $site->title() ?>.</p>
  </section>
  <? endif ?>

</footer>

<!-- 6 Javascript
- - - - - - - - - - - - - - - - - - - - - -->

<? echo js ('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')
      . js('assets/js/scripts.js') ?>

</body>
</html>