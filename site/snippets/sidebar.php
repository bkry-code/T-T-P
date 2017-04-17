<!-- 3 Sidebar
- - - - - - - - - - - - - - - - - - - - - -->

<aside class="SB trns-250">

<!-- 3.1 Types -->

	<? if($page->isHomePage()): ?>
		<ul class=SB-lst>
			<h6 class=SB-lst-title>Types —</h6>
			<? foreach($types as $type): ?>
				<li class="SB-lst-li SB-lst-li--filter"><span class="SB-lst-li-ico fa SB-lst-li-ico--check fa-check-square-o"></span><? echo $type->title() ?></li>
			<? endforeach ?>
		</ul>

<!-- 3.2 Error -->

		<? elseif($page->template() === 'error'): ?>

<!-- 3.3 Publications -->

	<? elseif($page->siblings()->visible()->count() > 1): ?>
		<ul class=SB-lst>
			<h6 class=SB-lst-title><?= $page->parent()->title() ?> —</h6>
			<? foreach($posts as $post): ?>
				<? if($post->parent() === $page->parent()
				   && $post->isActive() === false ): ?>
					<a href="<? echo $post->url() ?>" title="<? echo $post->title() ?>">
					<span class="SB-lst-li-ico fa fa-<? echo $post->parent()->icon()?>"></span>
						<li class=SB-lst-li><? echo $post->title() ?>
							<? if( $post->parent()->author() == 'true'
							   || $post->parent()->time() == 'true'):
							   $author = $site->user( $post->author() )->firstName()
							           . '&nbsp;'
							           . $site->user( $post->author() )->lastName();
							   $date = $post->date('F j, Y', 'time'); ?>
						<p class=SB-lst-li-meta>
						<? if($post->parent()->time() == 'true'): ?>
							<time class=date datetime="<? echo $date ?>"><? echo $date ?></time>
						<? endif ?>
						<?if($post->parent()->author() == 'true'): ?>
							<span class=author><? echo $author ?></span><br><? endif; ?></p>
						<? endif ?>
					</a>
				<? endif ?>
			<? endforeach ?>
		</ul>
	<? endif ?>

</aside>