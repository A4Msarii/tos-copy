window.addEventListener('beforeunload', function () {
  document.getElementById("loading-screen").style.display = "block";
  document.getElementById("content").style.display = "none";
  document.getElementById("header-hide").style.display = "none";
});

window.addEventListener('load', function () {
  document.getElementById("loading-screen").style.display = "none";
  document.getElementById("content").style.display = "block";
  document.getElementById("header-hide").style.display = "block";
  document.getElementById("content1").style.display = "block";
});

