function show() {
    var show = document.getElementById("idk");
    var hide1 = document.getElementById("hide");
    var hide = document.getElementById("bajra");
    if (show.style.display === "flex") {
      show.style.display = "none";
      hide.style.display = "block";
      hide1.style.display = "block";
    } else {
      show.style.display = "flex";
      hide.style.display = "none";
      hide1.style.display = "none";
    }
  }