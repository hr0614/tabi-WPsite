MicroModal.init({
  disableScroll: true,
});

$(function () {
  $(".slider li").on("click", function () {
    let select_img = $(this).find("img").attr("src");
    $(".modal__container img").attr("src", select_img);
    console.log("img_url");
  });
});

$(function () {
  $(".masonry-item").on("click", function () {
    let select_img = $(this).find("img").attr("src");
    $(".modal__container img").attr("src", select_img);
    console.log("img_url");
  });
});