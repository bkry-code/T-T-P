<? snippet('header') ?>
<? snippet('sidebar') ?>

<!-- 4 Feed
- - - - - - - - - - - - - - - - - - - - - -->

<main class="M trns-250">

<!-- 4.1 Error -->

  <section class="feed-error">
    <script>
      function errorMessage () {
        if (feed.height() < 100)  {
            $(".feed-error").html("<article class='error pub'>"
            + "<header class='pub-H'>"
            + "<h1 class='pub-H-title'>"
            + "<? echo $site->feedErrorTitle(); ?>"
            + "</h1>"
            + "</header>"
            + "<section class='pub-B'>"
            + "<? echo $site->feedErrorText()->kt(); ?>"
            + "</section></header></article>");

        } else if ($('.feed-error').children().length > 0) {
              $(".feed-error").html("");
           }
      }
    </script>
  </section>

  <section class="feed">

<!-- 4.2 Posts -->

    <? foreach($posts as $post): ?>
      <a href="<? echo $post->url() ?>" class="feed-post-<? echo $post->parent()->title() ?>">
        <article class="feed-post">

    <!-- 4.2.1 Icon -->

          <span class="feed-post-ico fa fa-<? echo $post->parent()->icon() ?>"></span>

    <!-- 4.2.2 Title -->

          <header class="feed-post-H">
            <h2 class="feed-post-H-title"><? echo $post->title() ?></h2>

    <!-- 4.2.3 Metadata -->

            <? if($post->parent()->author() == 'true'
              || $post->parent()->time() == 'true'):

              $author = $site->user( $post->author() )->firstName()
              . ' '
              . $site->user( $post->author() )->lastName();
              $date = $post->date('F j, Y', 'time'); ?>

              <p class="feed-post-H-meta">
                <? if($post->parent()->author() == 'true'): ?>
                  by&nbsp;<span class="author"><? echo $author ?></span>
                <? endif; ?>
                <? if($post->parent()->time() == 'true'): ?>
                  on&nbsp;<time class="date" datetime="<? echo $date ?>"><? echo $date ?></time>
                <? endif ?>
              </p>
            <? endif ?>
          </header>

  <!-- 4.2.4 Abstract -->

          <p class="feed-post-abst">
            <? if($post->abstract()->isNotEmpty()): ?>
              <? echo $post->abstract() ?>
            <? else: ?>
              <? echo excerpt($post->text(), 35, 'words') ?>
            <? endif ?>
          </p>

  <!-- 4.2.5 Types -->

          <ul class="feed-post-lst">
            <? foreach($post->topics()->split(',') as $topic): ?>
              <li class="feed-post-lst-li">
                <span class="feed-post-lst-li-ico">#</span><? echo html($topic) ?>
              </li>
            <? endforeach ?>
          </ul>

          <p class="feed-post-hint">Click to read publication.</p>
        </article>
      </a>
    <? endforeach ?>

  </section>
</main>

<? snippet('footer') ?>