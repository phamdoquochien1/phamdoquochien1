
var tabs = document.getElementsByClassName("tab");
var contents = document.getElementsByClassName("content-tab-item");
function ShowTab(tab, content){
  var i;
  var tabs = document.getElementsByClassName("tab");
  var contents = document.getElementsByClassName("content-tab-item");
  var tabclick = document.getElementById(tab);
  var contentsclick = document.getElementById(content);
  for(i = 0; i < tabs.length; i++){
    tabs[i].classList.remove("active");
    contents[i].classList.remove("active-tab");
  }
  tabclick.classList.add("active");
  contentsclick.classList.add("active-tab");
}