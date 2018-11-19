jQuery( document ).ready(function( $ ) {
	$(".button-collapse").sideNav();
	$('.wscs-dropdown').dropdown();
});

jQuery( document ).ready(function( $ ) {
  var coll = document.getElementsByClassName("listbox");
  var i;
  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var j;
      for (j = 0; j < coll.length; j++) {
        if (i != j) {
          coll[j].classList.remove("listbox-active");
        }
      }
      var content = this.children[1];
      if (content.style.display === "inline-block") {
        content.style.display = "none";
      } else {
        content.style.display = "inline-block";
      }
    });
  }
});
