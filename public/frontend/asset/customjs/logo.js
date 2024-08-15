document.addEventListener('DOMContentLoaded', function () {
    // Hide the preloader after 3 seconds or immediately after the page loads
    setTimeout(function () {
        const loaderWrap = document.querySelector('.loader-wrap');
        const easyLandText = document.querySelector('.easyland-text');
        if (loaderWrap) {
            loaderWrap.style.display = 'none';
        }
        if (easyLandText) {
            easyLandText.style.display = 'inline'; // Ensure the text is displayed
        }
    }, 3000); // Adjust the delay as needed

    // Optionally, add functionality to close the preloader manually
    const preloaderClose = document.querySelector('.preloader-close');
    if (preloaderClose) {
        preloaderClose.addEventListener('click', function () {
            const loaderWrap = document.querySelector('.loader-wrap');
            if (loaderWrap) {
                loaderWrap.style.display = 'none';
            }
        });
    }
});
