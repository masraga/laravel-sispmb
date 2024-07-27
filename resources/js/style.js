/** 
 * toggle top nav setting button
*/
function topNavSettingToggle(){
  const button = document.querySelector("#setting-button");
  const items = document.querySelector("#setting-button+.setting-item");
  if(!button){
    return false;
  }
  button.addEventListener("click", e => {
    items.classList.toggle("hidden");
  })
}
topNavSettingToggle();