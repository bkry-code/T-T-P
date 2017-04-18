<? snippet('header') ?>
<? snippet('sidebar') ?>

<!-- 4 Publication
- - - - - - - - - - - - - - - - - - - - - -->

<main class="M trns-250">
  <article class="blogpost pub">

<!-- 4.1 Header -->

     <header class="pub-H">

  <!-- 4.1.1 Title -->

      <h1 class="pub-H-title"> <? echo $page->title() ?></h1>

  <!-- 4.1.1 Subtitle -->

      <? if( $page->subtitle()->isNotEmpty()): ?>
          <h2 class="pub-H-subtitle"><? echo $page->subtitle() ?></h2>
      <? endif; ?>

  <!-- 4.1.3 Metadata -->

      <? if( $page->parent()->author() == 'true'
       || $page->parent()->time() == 'true'): ?>

        <? $author = $site->user( $page->author() )->firstName()
            . ' '
            . $site->user( $page->author() )->lastName();
        $date = $page->date('F j, Y', 'time'); ?>

        <p class="pub-H-meta">Published
          <? if($page->parent()->author() == 'true'): ?>
            by <span class="author"><? echo $author ?></span>
          <? endif; ?>

          <? if($page->parent()->time() == 'true'): ?>
            on <time class="date" datetime="<? echo $date ?>" dataprop="datePublished"><? echo $date ?></time>
          <? endif ?>
        </p>
      <? endif; ?>

    </header>

<!-- 4.2 Body -->

    <section class="pub-B">
      <? echo $page->text()->kt() ?>
    </section>

<!-- 4.3 Footer -->

    <? if($page->parent()->sharing() == 'true'
       || $page->parent()->topic() == 'true'
       || $page->parent()->revision() == 'true'
       || $page->related1()->isNotEmpty()
       || $page->related2()->isNotEmpty()
       || $page->related3()->isNotEmpty()
       || $page->related4()->isNotEmpty()
       || $page->related5()->isNotEmpty()): ?>

      <footer class="pub-F">
        <? if($page->parent()->sharing() == 'true'): ?>

  <!-- 4.3.1 Sharing links -->

          <section class="pub-F-share">
            <ul class="pub-F-share-lst">
              <h6 class="pub-F-share-lst-title">Share via:</h6>

              <li class="pub-F-share-lst-li">
                <a title="Share this via Email" href="mailto:?subject=<?= $page->title()->kirbyText() ?> by Dylan Degeling&amp;body=<?php echo $page->url() ?>">Email</a>
              </li>

              <li class="pub-F-share-lst-li">
                <a title="Share this on Twitter" href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<? echo rawurlencode($page->url()); ?>%20<?php echo ('via @dylandegeling')?>">Twitter</a>
              </li>

              <li class="pub-F-share-lst-li">
                <a title="Share this on Facebook" href="https://www.facebook.com/sharer.php?u=<? echo rawurlencode ($page->url()); ?>">Facebook</a>
              </li>

              </li>
            </ul>
          </section>
        <? endif ?>

  <!-- 4.3.2 Revision date -->

        <? if($page->parent()->revision() == 'true'): ?>

          <? $revision = $page->modified('F j, Y'); ?>

        <section class="pub-F-rev">
          <p>Last revision: <time class="date" datetime="<? echo $revision ?>"><? echo $revision ?></time></p>
        </section>
        <? endif; ?>

  <!-- 4.3.2 Related publications -->

        <? if($page->related1()->isNotEmpty()
            ||$page->related2()->isNotEmpty()
            ||$page->related3()->isNotEmpty()
            ||$page->related4()->isNotEmpty()
            ||$page->related5()->isNotEmpty()): ?>
          <section class="pub-F-rltd">
            <ul class="pub-F-rltd-lst">
              <h6 class="pub-F-rltd-lst-title">Related <? echo $page->parent()->title() ?>:</h6>
              <? if($page->related1()->isNotEmpty()): ?>
                <? foreach($page->siblings()->visible() as $related): ?>
                  <? if($related->url() === $page->parent()->url() . '/' . $page->related1()):?>
                  <a href="<? echo $related->url() ?>">
                    <li class="pub-F-rltd-lst-li">
                      <span class="pub-F-rltd-lst-ico fa fa-<? echo $page->parent()->icon() ?>"></span>
                        <? echo $related->title() ?>
                    </li>
                  </a>
                  <? endif ?>
                <? endforeach ?>
              <? endif ?>

              <? if($page->related2()->isNotEmpty()): ?>
                <? foreach($page->siblings()->visible() as $related): ?>
                  <? if($related->url() === $page->parent()->url() . '/' . $page->related2()):?>
                  <a href="<? echo $related->url() ?>">
                    <li class="pub-F-rltd-lst-li">
                      <span class="pub-F-rltd-lst-ico fa fa-<? echo $page->parent()->icon() ?>"></span>
                        <? echo $related->title() ?>
                    </li>
                  </a>
                  <? endif ?>
                <? endforeach ?>
              <? endif ?>

              <? if($page->related3()->isNotEmpty()): ?>
                <? foreach($page->siblings()->visible() as $related): ?>
                  <? if($related->url() === $page->parent()->url() . '/' . $page->related3()):?>
                  <a href="<? echo $related->url() ?>">
                    <li class="pub-F-rltd-lst-li">
                      <span class="pub-F-rltd-lst-ico fa fa-<? echo $page->parent()->icon() ?>"></span>
                        <? echo $related->title() ?>
                    </li>
                  </a>
                  <? endif ?>
                <? endforeach ?>
              <? endif ?>

              <? if($page->related4()->isNotEmpty()): ?>
                <? foreach($page->siblings()->visible() as $related): ?>
                  <? if($related->url() === $page->parent()->url() . '/' . $page->related4()):?>
                  <a href="<? echo $related->url() ?>">
                    <li class="pub-F-rltd-lst-li">
                      <span class="pub-F-rltd-lst-ico fa fa-<? echo $page->parent()->icon() ?>"></span>
                        <? echo $related->title() ?>
                    </li>
                  </a>
                  <? endif ?>
                <? endforeach ?>
              <? endif ?>

              <? if($page->related5()->isNotEmpty()): ?>
                <? foreach($page->siblings()->visible() as $related): ?>
                  <? if($related->url() === $page->parent()->url() . '/' . $page->related5()):?>
                  <a href="<? echo $related->url() ?>">
                    <li class="pub-F-rltd-lst-li">
                      <span class="pub-F-rltd-lst-ico fa fa-<? echo $page->parent()->icon() ?>"></span>
                        <? echo $related->title() ?>
                    </li>
                  </a>
                  <? endif ?>
                <? endforeach ?>
              <? endif ?>
            </ul>
          </section>
        <? endif; ?>

  <!-- 4.3.3 Topics -->

        <? if($page->parent()->topic() == 'true'): ?>
          <section class="pub-F-topic">
            <ul class="pub-F-topic-lst">
              <? foreach($page->topics()->split(',') as $topic): ?>
                <li class="pub-F-topic-lst-li"><? echo html($topic) ?></li>
              <? endforeach ?>
            </ul>
          </section>
        <? endif; ?>

      </footer>
    <? endif; ?>

  </article>
</main>

<? snippet('footer'); ?>