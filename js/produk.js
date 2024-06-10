var keywordPdk = document.getElementById('keywordPdk');
var cariPdk = document.getElementById('cariPdk');
var container = document.getElementById('container');

keywordPdk.addEventListener('keyup', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', '../ajax/produk.php?keywordPdk=' + keywordPdk.value, true);
    xhr.send();
});