/*
Author: Dylan Degeling
URL: dylandegeling.nl
*/

// Variables.
var input, feed, posts;

input = $("#queryFilter");
feed = $(".feed");
posts = feed.find("a");

// Session storage test.
try {
  sessionStorage.setItem("sessionStorageTest", "Succes!");
  var sessionStorageResult = true;

} catch (e) {
  var sessionStorageResult = false;
}

// React to screen size changes.
function responsiveDisplay () {
  if ($('.SB').css('display') == 'none'
  && $(".feed").length == 1) {
    posts.addClass("show--type").
    removeClass("hide--type");
    $(".SB-lst-li-ico").addClass("SB-lst-li-ico--check fa-check-square-o")
    .removeClass("fa-square-o");

  if (sessionStorageResult == true) {
    sessionStorage.clear();
  }
    displayPosts();
  }
}

responsiveDisplay();
$( window ).resize(function() {
  responsiveDisplay();
});

// Display posts based on query and type filter.
function displayPosts() {
  posts.each(function() {
    if ($(this).hasClass("show--query") == true
    && $(this).hasClass("show--type") == true ) {
      $(this).css("display", "block");

    } else {
      $(this).css("display", "none");
    }

    errorMessage();

    return posts
  });
}

// Display posts based on input query.
function queryFilter() {
  var i, input, filter, article;

  input = $("#queryFilter")[0];
  filter = input.value.toLowerCase();

  if ( sessionStorageResult == true ) {
    sessionStorage.setItem("input", filter);
  }

  for (i = 0; i < posts.length; i++) {

    article = posts[i].getElementsByTagName("article")[0];

    if (article.innerHTML.toLowerCase().indexOf(filter) > -1) {
      $(posts[i]).addClass("show--query")
      .removeClass("hide--query")
      displayPosts();

    } else {
      $(posts[i]).addClass("hide--query")
      .removeClass("show--query")
      displayPosts();
    }
  }

  return false
}

// Display posts based on session storage values.
if ( sessionStorageResult == true
&& $(".feed").length == 1 ) {

  var t, query, type, typeAmount, post;

  if (sessionStorage.getItem(input) == null) {
    posts.addClass("show--query");
    displayPosts();

  } else {
    query = sessionStorage.getItem("input");
    input.val(query);
  }

  typeAmount = $(".SB-lst").children(".SB-lst-li--filter").length;

  for (t = 0; t < typeAmount; t++ ) {

  type = $(".SB-lst").children(".SB-lst-li--filter:eq( "+t+" )").text();
  post = $(".feed-post-" + type);

  if (sessionStorage.getItem(type) == null) {
    sessionStorage.setItem(type, "show");
    post.addClass("show--type");
    displayPosts();

  } else if (sessionStorage.getItem(type) == "show") {
    post.addClass("show--type");
    displayPosts();

  } else {
    post.addClass("hide--type");
    $(".SB-lst").children(".SB-lst-li--filter:eq( "+ t +" )")
    .find(".SB-lst-li-ico")
    .toggleClass("SB-lst-li-ico--check fa-square-o fa-check-square-o");
    displayPosts();
  }
}
// Reset for visitors that can not use session storage.
} else if ($(".feed").length == 1) {
  posts.addClass("show--type show--query");
  displayPosts();
}

// Clear session storage when returning to feed via footer menu.
$( "a[title='Home']" ).click(function() {
  if (sessionStorageResult == true) {
    sessionStorage.clear();
  }
});

// Filter posts based on type filter.
$(".SB-lst-li--filter").click(function() {
  var type, post;

  type = $(this, ".SB-lst-li--filter").text();
  post = $(".feed-post-" + type);

  $(".SB-lst-li-ico", this).toggleClass("SB-lst-li-ico--check fa-square-o fa-check-square-o");

  if(post.hasClass("hide--type")) {
    post.addClass("show--type")
    .removeClass("hide--type");
    displayPosts();

  } else {
    post.addClass("hide--type");
    post.removeClass("show--type");
    displayPosts();

  } if (sessionStorageResult == true) {
    if (sessionStorage.getItem(type) == "show") {
      sessionStorage.setItem(type, "hide");

    } else {
      sessionStorage.setItem(type, "show");
    }
  }
});

// Change search icon when query input is focused.
$(".H-form-inp").focus(function() {
  $(".H-form-btn").addClass("H-form-btn--hl");
});

$(".H-form-inp").focusout(function() {
  $(".H-form-btn").removeClass("H-form-btn--hl");
});

// Changing publication and wrapping publication content.
$(".pub-B > h4").each(function(){
    $(this).wrap("<h6>");
    $(this).contents().unwrap();
  });
    $(".pub-B > h3").each(function(){
    $(this).wrap("<h5>");
    $(this).contents().unwrap();
  });
    $(".pub-B > h2").each(function(){
    $(this).wrap("<h4>");
    $(this).contents().unwrap();
  });
  $(".pub-B > h1").each(function(){
    $(this).wrap("<h3>");
    $(this).contents().unwrap();
  });
  $(".pub-B > pre").each(function(){
    $(this).wrap("<figure>");
  });
  $(".pub-B > iframe").each(function(){
    $(this).wrap("<figure>");
  });
  $(".pub-B > div").each(function(){
    $(this).wrap("<figure>");
  });