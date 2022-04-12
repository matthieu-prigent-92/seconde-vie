// Scroll to middle of the page
window.addEventListener("click", function () {
  window.scrollTo(window.scrollX, window.scrollY - 200);
});

// Add class to last element
document
  .querySelector(".purchase-info")
  .querySelector(".block:last-child").className += "ajouter";

// change defaut cursor
var elms = document.getElementsByTagName("body");
var n = elms.length;
for (var i = 0; i < n; i++) {
  if (window.getComputedStyle(elms[i]).cursor == "pointer") {
    elms[i].style.cursor = "url(../upload/asperge-default.svg)";
  }
}

