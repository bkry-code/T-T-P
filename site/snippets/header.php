<!doctype html>
<html lang="en">

<!--
Author: Dylan Degeling
URL: github.com/dylandegeling/t-t-p
-->

<!-- 1 Head
- - - - - - - - - - - - - - - - - - - - - -->
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />

<!-- 1.1 Title -->

  <title>
    <? if($page->isHomepage()): ?>
      <?=  $site->title() ?> &mdash; <?= $site->subtitle() ?>
    <? else: ?>
      <?= $page->title() ?> &mdash; <?= $site->title() ?>
    <? endif ?>
  </title>

<!-- 1.1 Description -->

  <? if($page->isHomepage()
     && $site->description()->isNotEmpty()): ?>
    <meta name="description" content="<?= $site->description() ?>">
  <? elseif($page->abstract()->isNotEmpty()): ?>
    <meta name="description" content="<? echo $page->abstract() ?>">
  <? else: ?>
    <meta name="description" content="<? echo excerpt($page->text(), 35, 'words') ?>">
  <? endif ?>

<!-- 1.2 Keywords -->

  <? if($page->isHomepage()): ?>
     <meta name="keywords" content="<? echo $site->keywords() ?>">
  <? else: ?>
    <meta name="keywords" content="<? echo $page->topics() ?>">
  <? endif ?>

<!-- 1.3 Favicon -->

  <? if($site->favicon32x32()->isNotEmpty()): ?>
    <link rel="icon" type="image/png" href="<? echo $site->favicon32x32()->toFile()->url() ?>" sizes="32x32">
  <? endif; if($site->favicon16x16()->isNotEmpty()): ?>
    <link rel="icon" type="image/png" href="<? echo $site->favicon16x16()->toFile()->url() ?>" sizes="16x16">
  <? endif; if($site->favicon()->isNotEmpty()): ?>
    <link rel="shortcut icon" href="<? echo $site->favicon()->toFile()->url() ?>">
  <? endif ?>

<!-- 1.4 Stylesheets -->

  <? echo css('https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700')
        . css('https://use.fontawesome.com/7cbec18174.css')
        . css('assets/css/style.css') ?>

<!-- 1.5 Microdata -->
  <? if($page->isHomepage()): ?>
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "WebSite",
          "@context": "http://schema.org",
          "@type": "WebSite",
          "url": "<? echo $site->url() ?>",
          "name": "<? echo $site->subtitle() ?>",
          "description": "<? echo $site->description() ?>",
          "publisher": "<? echo $site->title() ?>"
      }
    </script>

  <? elseif ($page->template() == "publication" ): ?>
    <script type="application/ld+json">
      {
        "@context" : "http://schema.org",
        "@type" : "Article",
        "mainEntityOfPage": {
         "@type": "WebPage",
         "@id": "<? $site->url() ?>"
        },
        "headline" : "<? echo $page->title() ?>",
        "publisher" : "<? echo $site->title()?>",
        "datePublished" : "<? echo $page->date('F j, Y', 'time') ?>",
        "dateModified" : "<? echo $page->modified('F j, Y') ?>",
        "articleBody" : "<? echo strip_tags($page->text()->kt()) ?>",
        "author" : {
          "@type" : "Person",
          "name" : "<? echo $site->user( $page->author() )->firstName() . ' ' . $site->user( $page->author() )->lastName() ?>"
        }
      }
    </script>
  <? endif ?>

</head>

<body id="<? $pageid = str_replace(' ', '_', $page->title()->lower()); echo $pageid; ?>">

<!-- 2 Header
- - - - - - - - - - - - - - - - - - - - - -->

<header class="H trns-250">

<!-- 2.1 Subtitle -->

  <h1 class="H-title"><?= $site->subtitle() ?></h1>

<!-- 2.2 Search/Return icon -->

  <? if($page->isHomepage()): ?>
    <a title="Home" class="H-btn trns-250 fa fa-search"></a>
  <? else: ?>
    <a
      class="H-btn trns-250 fa fa-arrow-left"
      title="Go to homepage"
      href="<? echo $site->url() ?>"
    ></a>
  <? endif ?>

<!-- 2.3 Query input -->

  <input
    id="queryFilter"
    onkeyup="queryFilter()"
    class="H-inp"
    type="text"
    name="q"
    value="<?php echo esc($query) ?>"
    placeholder="<?= $site->title() ?>"
  <? if($page->isHomepage() === false): ?>
    disabled="disabled"
  <? endif ?>/>

</header>