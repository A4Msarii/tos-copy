
window.onbeforeunload = function() {
  document.getElementById("loading-screen").style.display = "block";
  document.getElementById("content").style.display = "none";
  document.getElementById("header-hide").style.display = "none";
  document.getElementById("aside").style.display = "none";

}
document.body.onload = function() {
  document.getElementById("loading-screen").style.display = "none";
  document.getElementById("content").style.display = "block";
  document.getElementById("header-hide").style.display = "block";
  document.getElementById("content1").style.display = "block";
 
};
