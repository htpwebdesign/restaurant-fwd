jQuery('.gallery').magnificPopup({
    delegate: 'a', // child items selector, by clicking on it popup will open
    type: 'image',
    gallery: {
        enabled: true,
        navigateByImgClick: true,
    }
    // other options
  });