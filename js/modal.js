MicroModal.init({
  disableScroll: true,
});

$(function () {
  $(".slider li").on("click", function () {
    let select_img = $(this).find("img").attr("src");
    let alt_text = $(this).find("img").attr("alt");
    $(".img_caption").text(alt_text);
    $(".modal__container img").attr("src", select_img);
    if (!alt_text) {
      alt_text = "";
    }
    $(".img_caption").text(alt_text);
    console.log("img_url");
    console.log(select_text)
  });
});



$(function () {
  $(".masonry-item").on("click", function () {
    let select_img = $(this).find("img").attr("src");
    let alt_text = $(this).find("img").attr("alt");
    $(".modal__container img").attr("src", select_img);
    if (!alt_text) {
      alt_text = "";
    }
    $(".img_caption").text(alt_text);

    console.log("img_url");
  });
});