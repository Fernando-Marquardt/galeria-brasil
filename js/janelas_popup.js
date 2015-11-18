function AbreJanelaGaleria(URL) {
  var width = 625;
  var height = 395;
  var left = 50;
  var top = 10
  window.open(URL, 'ema3', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}

function popup(url) {
	dir = document.getElementById('dir').value;
	img = document.getElementById('foto_atual').value;
	
	url = url + "?imagem=" + dir + img;
	
	window.open(url,'popupImageWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150')
}

function imprimi(url) {
	dir = document.getElementById('dir').value;
	img = document.getElementById('foto_atual').value;
	
	url = url + "&imagem=" + dir + img;
	
	window.open(url,'popupImageWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150')
}

function indica(url) {
	img = document.getElementById('foto_atual').value;
	pg = document.getElementById('pagina').value;
	
	url = url + "&imagem="+ img +"&pg="+ pg;

	window.open(url,'popupImageWindow','width=300, height=150, top=12, left=15, scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no')
}

function cores(url) {
  window.open(url,'popupImageWindow','width=225, height=169, top=10, left=10, scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no')
}

// =============== janela.php =====================
function mudar_pagina(pg) {
	window.location.href = "janela.php?pg="+ pg;
}

function mudar_foto(dir, foto, width, height) {
	img = document.getElementById('foto');
	
	img.src = dir + foto;
	img.width = width;
	img.height = height;
	
	document.getElementById('dir').value = dir;
	document.getElementById('foto_atual').value = foto;
}