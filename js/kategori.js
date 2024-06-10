var keywordKat = document.getElementById('keywordKat');
var cariKat = document.getElementById('cariKat');
var container = document.getElementById('container');

keywordKat.addEventListener('keyup', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', '../ajax/kategori.php?keywordKat=' + keywordKat.value, true);
    xhr.send();
});