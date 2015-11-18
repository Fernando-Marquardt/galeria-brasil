/*
	@author Fernando Marquardt
	@version 0.1.0
	
	Classe para utilização de máscaras em campos de formulários
	
	Requisitos:
		- Mootools 1.2 ou superior
		
	** LOG **
	
	Versão 0.1.0 - 24/07/2008
*/

var Mask = new Class({
	masks: {
		date_iso: {
			format: '    -  -  ',
			regex: /\d/
		},
		date_us: {
			format: '    /  /  ',
			regex: /\d/
		},
		date: {
			format: '  /  /    ',
			regex: /\d/
		}
	},
	
	/**
	 * Cria a máscara no campo
	 * 
	 * @param {Object} field
	 * @param {Object} mask
	 */
	create_mask: function(field, mask) {
		if (typeof(mask) == 'string') {
			mask = this.masks[mask];
		}
		
		$(field).addEvent('keypress', function(event) {
			this.apply_mask(field, mask, event);
		}.bind(this));
	},
	
	apply_mask: function(field, mask, event) {
		if (this._is_printable(event.code)) {
			var str = $(field).value + event.key;
			
			if (mask.regex.test(event.key) && str.length <= mask.format.length) {
				if (mask.format.charAt(str.length - 1) != ' ') {
					str = $(field).value + mask.format.charAt(str.length - 1) + event.key;
				}
				
				$(field).value = str;
			}
			
			event.stop();
		}
	},
	
	/**
	 * Retorna true se a tecla for um caractere
	 * 
	 * @param {Object} key
	 */
	_is_printable: function(key) {
		return ( key >= 32 && key < 127 );
	},

	/**
	 * Retorna o código da tecla associada ao evento
	 * 
	 * @param {Object} e
	 */
	_get_key: function(e) {
		return window.event ? window.event.keyCode : e ? e.which : 0;
	}
});
