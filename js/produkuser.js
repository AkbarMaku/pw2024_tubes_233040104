var keywordUsr = document.getElementById('keywordUsr');
var cariUsr = document.getElementById('cariUsr');
var container = document.getElementById('containerUsr');

keywordUsr.addEventListener('keyup', function () {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/produk_user.php?keywordUsr=' + keywordUsr.value, true);
    xhr.send();
});