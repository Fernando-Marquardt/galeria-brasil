var Galeria = {
	img: null,
	gal_pasta: null,
	gal_codigo: null,
	arquivo: null,
	mensagem: null,
	
	imagem: {
		escolher: function(gal_pasta, gal_codigo, img, arquivo, mensagem) {
			Galeria.img = img;
			Galeria.gal_pasta = gal_pasta;
			Galeria.gal_codigo = gal_codigo;
			Galeria.arquivo = arquivo;
			Galeria.mensagem = mensagem;
			
			$('capa').src = "imagem.php?gal="+ gal_pasta +"&img="+ arquivo +"&thumb=3";
			$('capa').alt = mensagem;
			$('capa').title = mensagem;
		},
		
		tamanho_real: function() {
			System.window.open('imagem.php?gal='+ Galeria.gal_pasta +'&img='+ Galeria.arquivo, {scrollbars: 'yes', resizable: 'yes', name: 'ImagemTamanhoReal'});
		},
		
		imprimir: function() {
			System.window.open('imprimir.php?gal='+ Galeria.gal_pasta +'&img='+ Galeria.arquivo, {scrollbars: 'yes', resizable: 'yes', name: 'ImagemImprimir'});
		},
		
		indicar: function() {
			System.window.open('indicar.php?gal='+ Galeria.gal_codigo +'&img='+ Galeria.img, {width: 400, height: 350,scrollbars: 'yes', resizable: 'no', name: 'ImagemIndicar', position: {x: 'center', y: 'middle'}});
		}
	},
	
	configurar: function(gal_pasta, gal_codigo, img, arquivo, mensagem) {
		Galeria.img = img;
		Galeria.gal_pasta = gal_pasta;
		Galeria.gal_codigo = gal_codigo;
		Galeria.arquivo = arquivo;
		Galeria.mensagem = mensagem;
	}
};
