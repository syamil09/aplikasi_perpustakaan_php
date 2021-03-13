// cari anggota
let keywordAnggota = document.getElementById('keywordAnggota');
let containerAnggota = document.getElementById('containerAnggota');

keywordAnggota.addEventListener('keyup',function(){
    // buat object ajax
    let ajaxAnggota = new XMLHttpRequest();

    // cek kesiapan ajax
    ajaxAnggota.onreadystatechange = function(){
        if(ajaxAnggota.readyState == 4 && ajaxAnggota.status == 200) {
            console.log("ajax ok");
            containerAnggota.innerHTML = ajaxAnggota.responseText;
        }
    }

    // eksekusi ajax
    // buka koneksi ajax
    ajaxAnggota.open('GET','ajax/data_anggota.php?keyword='+keywordAnggota.value,true);
    ajaxAnggota.send();
});