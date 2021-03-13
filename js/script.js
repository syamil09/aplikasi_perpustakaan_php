

// cari Buku
let keywordBuku = document.getElementById('keyword');
let containerBuku = document.getElementById('container');

keywordBuku.addEventListener('keyup',function(){
    
    // buat object ajax
    let ajaxBuku = new XMLHttpRequest();
    // cek kesiapan ajax
    ajaxBuku.onreadystatechange = function(){
        if(ajaxBuku.readyState == 4 && ajaxBuku.status == 200) {
            console.log("ajax ok");
            containerBuku.innerHTML = ajaxBuku.responseText;
        }else{
            console.log('gagal');
        }
    }

    // eksekusi ajax
    // buka koneksi ajax
    ajaxBuku.open('GET','ajax/data_buku.php?keyword='+keywordBuku.value,true);
    ajaxBuku.send();
});