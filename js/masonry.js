
const ulElement = document.getElementById("target");
const childElementCount = ulElement.childElementCount;

const imgs = document.getElementsByClassName('masonry-img');
const image = new Image();

for (const img of imgs) {
  console.log(img.naturalWidth + "x" + img.naturalHeight);
  if (img.naturalWidth < img.naturalHeight) {
    console.log("縦長です");
    img.parentElement.classList.add("is-h-2");
  };
  //liへのクラス付与が発火しない................
};