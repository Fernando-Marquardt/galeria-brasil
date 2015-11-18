/*
	@author Fernando Marquardt
	@version 0.2.0
	
	Classe para manipulação de formulários
	
	Requisitos:
		- Mootools 1.2 ou superior
		
	** LOG **
	
	Versão 0.2.0 - 10/06/2008
		[*] Classe alterada para ser compatível com Mootools 1.2
		[+] Adicionado o tipo de verificação 'repeat', permitindo a verificação de campos que devem possuir o mesmo valor
*/

var Form = new Class({
	options: {
		alerts: {
			required: "Este campo é obrigatório.",
			alpha: "Este campo deve conter apenas letras, espaços ou sinais (. _ -)",
			alphanum: "Este campo deve conter apenas letras, números, espaços ou sinais(. _ -)",
			number: "Este campo deve conter apenas números",
			email: "Este campo deve conter um E-Mail válido",
			date: "Este campo deve conter uma data válida",
			repeat: "Os campos devem conter o mesmo valor"
		},
		
		display: {
			errorLocation: 'before'
		},
		
		styles: {
			errorBgText: '',
			errorColor: '#FF4F56',
			errorBg: '#FF4F56'
		},
		
		regexp: {
			required : /[^.*]/,
			alpha : /^[a-z ._-]+$/i,
			alphanum : /^[a-z0-9 ._-]+$/i,
			number : /^[-+]?\d*\.?\d+$/,
			phone : /^[\d\s ().-]+$/,
			email : /^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i,
			date : /^[\d\/]{10}/i
		}
	},
	
	initialize: function(form, options) {
		this.form = form;
		this.setOptions(options);
	},
	
	validate: function() {		
		var error_count = 0;

		var arrRegex = new Hash(this.options.regexp);
		
		this.arrRemoveError = [];
		
		arrRegex.each(function(regex, type) {
			if (this.form == '') {
				var fields = $$('.'+ type);
			} else {
				var fields = $$('#'+ this.form +' .'+ type);
			}
			
			fields.each(function(field) {
				if (!field.hasClass('required')) {
					if (!this._validateRegex('required', field.value)) {
						field.requiredError = true;
						
						this.arrRemoveError.include(field);
					} else {
						field.requiredError = false;
					}
				}
				
				if (!this._validateRegex(type, field.value)) {
					if (!field.requiredError) {
						if (type == 'required') {
							field.requiredError = true;
						}
						this.arrRemoveError.erase(field);
						
						this._addError(field, type);
					}
					
					error_count++;
				} else {
					if (type == 'required') {
						field.requiredError = false;
					}
					
					this.arrRemoveError.include(field);
				}
			}, this);
		}, this);
		
		if (!this._validateRepeat()) {
			error_count++;
		}
		
		this.arrRemoveError.each(function(item) {
			this._removeError(item);
		}, this);
		
		if (error_count > 0) {
			return false;
		} else {
			return true;
		}
	},
	
	_validateRepeat: function() {
		var error_count = 0;
		var field_list = $$('.repeat');
		
		field_list.each(function(field) {
			var field_id = (field.id == '' || field.id == null) ? field.name : field.id;
			
			var field_repeat = $(field_id +'_r');
			
			if (field_repeat == null) {
				repeat_id = field_id +'_r';
				
				field_repeat = this.form.repeat_id;
			}
			
			if (!field.hasClass('required')) {
				if (!this._validateRegex('required', field.value)) {
					field.requiredError = true;
					
					this.arrRemoveError.include(field);
				} else {
					field.requiredError = false;
				}
			}
			
			if (!field.requiredError) {
				if (field.value != field_repeat.value) {
					this.arrRemoveError.erase(field);
					this.arrRemoveError.erase(field_repeat);
					
					this._addError(field, 'repeat');
					this._addError(field_repeat, 'repeat');
					
					error_count++;
				} else {
					this.arrRemoveError.include(field);
					this.arrRemoveError.include(field_repeat);
				}
			}
		}, this);
		
		if (error_count > 0) {
			return false;
		} else {
			return true;
		}
	},
	
	_validateRegex: function(type, value) {
		if (this.options.regexp[type].test(value)) {
			return true;
		} else {
			return false;
		}
	},
	
	_addError: function(input, type) {
		if (input.id == '' || input.id == null) {
			var input_id = input.name;
		} else {
			var input_id = input.id;
		}
		
		if ($('error_'+ input_id) == null) {
			var error = new Element('span', {
				'styles': {
					'opacity': 0,
					'color': this.options.styles.errorColor,
					'background-color': this.options.styles.errorBgText
				},
				'id': 'error_'+ input_id
			});
		} else {
			var error = $('error_'+ input_id);
			error.setOpacity(0);
		}
		
		error.set('text', this.options.alerts[type]);
		
		if (this.options.display.errorLocation == 'before') {
			error.setStyle('display', 'block');
			error.injectBefore(input);
		} else if (this.options.display.errorLocation == 'after') {
			error.injectAfter(input);
		}
		
		input.set('morph', {
			duration: 300
		});
		error.set('morph', {
			duration: 300
		});
		
		if (input.bgImg == '') {
			input.bgImg = input.getStyle('background-image');
		}
		
		if (input.bgColor == '') {
			input.bgColor = input.getStyle('background-color');
		}
		
		input.morph({
			'background-color': this.options.styles.errorBg,
			'background-image': 'none'
		});
		error.morph({
			'opacity': 1	
		});
	},
	
	_removeError: function(input) {
		if (input.id == '' || input.id == null) {
			var input_id = input.name;
		} else {
			var input_id = input.id;
		}
		
		var error = ($('error_'+ input_id));
		
		if (error) {
			error.set('morph', {
				duration: 300,
				onComplete: function() {
					error.destroy();
				}
			});
			
			input.morph({
				'background-color': input.bgColor,
				'background-image': input.bgImg
			});
			error.morph({
				'opacity': 0
			});
		}
	}
});
Form.implement(new Options);