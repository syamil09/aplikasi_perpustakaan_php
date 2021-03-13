// cari peminjaman
let keyword = document.getElementById('keyword');
let container = document.getElementById('container');

keyword.addEventListener('keyup',function(){
    
    // buat object ajax
    let ajax = new XMLHttpRequest();
    // cek kesiapan ajax
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200) {
            console.log("ajax ok");
            container.innerHTML = ajax.responseText;
        }else{
            console.log('gagal');
        }
    }

    // eksekusi ajax
    // buka koneksi ajax
    ajax.open('GET','ajax/data_peminjaman.php?keyword='+keyword.value,true);
    ajax.send();
});