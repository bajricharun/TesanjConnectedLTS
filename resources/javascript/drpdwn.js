function myFunction() {
    var x = document.getElementById("drp-content");
    var y = document.getElementById('timeline');
    var z = document.getElementsByClassName('text');
    var hide = document.getElementById("hide");
    var a = document.getElementById('main');
    var d = document.getElementsByClassName('container');
    if (x.style.display === "none") {
      d[0].style.marginLeft = "20%";
      x.style.display = "block";
      x.style.backgroundImage = "url('./background/gradina.jpg')";
      x.style.backgroundSize = "cover";
      x.style.backgroundPositionX = "40%";
      y.style.display = "none";
      bar.style.display = "none";
      var i = 0; 
      for (i = 0; i < z.length; i++) {
        z[i].style.width = "100%";
        z[i].style.paddingTop = "4.25%";
        z[i].style.paddingBottom = "4.25%";
        z[i].style.background = "#2c3039";
        z[i].style.color = "#fff";
      }
        hide.style.display = "none";
    } else {
      d[0].style.marginLeft = '0%';
      
      x.style.display = "none";      
      y.style.display = "block";
      
    }
  } 