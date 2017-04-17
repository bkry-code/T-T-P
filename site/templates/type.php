<!doctype html>
<html lang="en">

<!--
CMS: Kirby
Theme: Simplepub
URL: github.com/dylandegeling/simplepub
-->

<!-- 1 Head
- - - - - - - - - - - - - - - - - - - - - -->
<head>
  <title><?= $site->title() ?> — <?= $site->subtitle() ?></title>
</head>

<!-- 2 Body
- - - - - - - - - - - - - - - - - - - - - -->
<body>

<!-- 2.1 List of types -->
  <ul class="types" style="display:none">
    <? foreach($types as $type): ?>
      <li class="type">
        <? echo $type->title() ?>
      </li>
      <? endforeach ?>
  </ul>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- 2.2 Filter -->
  <script>
    // Measure the size of 1 rem.
    var rem = parseInt($("html").css("font-size"), 10);

    if ($("body").width() > 50 * rem) {
       // Session storage test.
      try {
        sessionStorage.setItem("sessionStorageTest", "Succes!");
        var sessionStorageResult = true;

      } catch (e) {
        var sessionStorageResult = false;
      }

      // Filter by posts in feed by URL type.
      if (sessionStorageResult = true) {
        var filterBy, typeAmount, type;

        filterBy = "<? echo $page->title() ?>";
        typeAmount = $(".types").children(".type").length;

        for (t = 0; t < typeAmount; t++) {
          type = $(".types").children(".type:eq( " + t + " )").text();

          if (type == filterBy) {
            sessionStorage.setItem(type, "show");

          } else {
            sessionStorage.setItem(type, "hide");
          }
        }
      }
    }

    // Return to feed.
    window.location.href = "/"
  </script>
</body>