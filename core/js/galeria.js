var Galeria = {
	imagem: {
		escolher: function(img_codigo) {
			var request = new Request({
				url: 'galeria_imagem.php?id='+ img_codigo,
				method: 'get',
				onRequest: function() {
					System.message.open('carregando', 'Carregando...');
				},
				onSuccess: function(response) {
					System.message.close('carregando');
					
					$('imagem').set('html', response);
					
					var tips = new Tips('.tips', {
						onShow: function(tip) {
							tip.fade('in');
						},
						onHide: function(tip) {
							tip.fade('out');
						}
					});
				},
				onFailure: function(instance) {
					System.message.close('carregando');
					
					System.message.open('falha', 'A requisição falhou');
				}
			}).send();
		},
		
		tamanho_real: function(gal_pasta, img_nome_arquivo) {
			System.window.open('imagem.php?gal='+ gal_pasta +'&img='+ img_nome_arquivo, {scrollbars: 'yes', resizable: 'yes', name: 'ImagemTamanhoReal'});
		},
		
		imprimir: function(gal_pasta, img_nome_arquivo) {
			System.window.open('imprimir.php?gal='+ gal_pasta +'&img='+ img_nome_arquivo, {scrollbars: 'yes', resizable: 'yes', name: 'ImagemImprimir'});
		},
		
		indicar: function(gal_codigo, img_codigo) {
			System.window.open('indicar.php?gal='+ gal_codigo +'&img='+ img_codigo, {width: 400, height: 350,scrollbars: 'yes', resizable: 'no', name: 'ImagemIndicar', position: {x: 'center', y: 'middle'}});
		}
	}
}
