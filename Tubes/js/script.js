//ambil elemen yang dibutuhkan
	let keyword = document.getElementById('keyword');
	let container = document.getElementById('container');

	// buat event
	keyword.addEventListener('keyup', function() {
		// membuat objek ajax
		let ajax = new XMLHttpRequest();
		// cek kesiapan ajax
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				container.innerHTML = ajax.responseText;
			}
		}

		//eksekusi ajax
		ajax.open('get', '../php/cari_ajax.php?keyword=' + keyword.value);
		ajax.send();
	});