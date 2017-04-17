<? return function($site, $pages, $page) {
	$types = $site->children()->visible();
	$topics = $site->grandchildren()->visible()->pluck('topics', ',', true);
	$posts = $site->grandchildren()->visible()->sortBy('time', 'desc');
	return compact('types', 'topics', 'posts');
};