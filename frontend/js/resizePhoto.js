document.querySelectorAll('.product img').forEach(function(img) {
    img.addEventListener('click', function(e) {
        var newImg = document.createElement('img');
        newImg.src = this.src;
        newImg.style.cursor = "pointer";
        newImg.style.position = 'fixed';
        newImg.style.top = '50%';
        newImg.style.left = '50%';
        newImg.style.transform = 'translate(-50%, -50%)';
        newImg.style.maxWidth = '800px';
        newImg.style.maxHeight = '1200px';
        newImg.style.zIndex = '9999';
        newImg.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
        newImg.addEventListener('click', function() {
            document.body.removeChild(this);
        });
        document.body.appendChild(newImg);
    });
})

