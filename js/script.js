document.addEventListener('DOMContentLoaded', function () {
  const url = new URL(window.location.href);
  const tabValue = url.searchParams.get("tab");

  if (tabValue) {
    const radioElement = document.getElementById(tabValue);
    if (radioElement) {
      radioElement.checked = true;
    }
  }
  const galleryWrapper = document.getElementById("gallery-wrapper");
  galleryWrapper.style.animationName = "fadeInAnime";
});

window.onload = function () {
  const spinner = document.getElementById('loading');
  spinner.classList.add('loaded');
}