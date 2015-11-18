/*
	@author Fernando Marquardt <fernando.marquardt@gmail.com>
	@version 0.3.0
	
	Classe para manipulação de formulários
	
	Requisitos:
		- Mootools 1.2 ou superior
		
	** LOG **
	
	Versão 0.3.0 - 18/08/2008
		[+] Acrescentado o modo de display floatingbox, que apresenta uma caixa flutuante ao lado do input contendo o erro
		[+] Acrescentado o modo de display bottom, que apresenta a mensagem de erro abaixo do input
		[+] Criados os métodos _showMessage e _hideMessage, que permite mostrar as mensagens de erro na forma tradicional
		[*] Métodos _addError e _removeError foram desmembrados, removendo as funcionalidades para mostrar os erros
	
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
			repeat: "Os campos devem conter o mesmo valor"
		},
		
		display: {
			errorLocation: 'floatingbox'
		},
		
		floatingBox: {
			msgOffset: 3,
			msgClass: 'floatingbox'
		},
		
		styles: {
			errorBgText: '#FFFFFF',
			errorColor: '#FF4F56',
			errorBg: '#FF4F56'
		},
		
		regexp: {
			required : /[^.*]/,
			alpha : /^[a-z ._-]+$/i,
			alphanum : /^[a-z0-9 ._-]+$/i,
			number : /^[-+]?\d*\.?\d+$/,
			phone : /^[\d\s ().-]+$/,
			email : /^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i
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
				}
				else {
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
		
		input.set('morph', {
			duration: 500
		});
		
		if (input.bgImg == '') {
			input.bgImg = input.getStyle('background-image');
		}
		
		if (input.bgColor == '') {
			input.bgColor = input.getStyle('background-color');
		} else {
			input.bgColor = '#FFFFFF';
		}
		
		input.morph({
			'background-color': this.options.styles.errorBg,
			'background-image': 'none'
		});
		
		var msgcontent = this.options.alerts[type];
		
		if (this.options.display.errorLocation == 'floatingbox') {
			this._showFloatingBox(input_id, msgcontent);
		} else {
			this._showMessage(input, type);
		}
	},
	
	_removeError: function(input) {
		if (input.id == '' || input.id == null) {
			var input_id = input.name;
		} else {
			var input_id = input.id;
		}
		
		input.morph({
			'background-color': input.bgColor,
			'background-image': input.bgImg
		});
		
		if (this.options.display.errorLocation == 'floatingbox') {
			this._hideFloatingBox(input_id);
		} else {
			this._hideMessage(input_id);
		}
	},
	
	_showMessage: function(input, type) {
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
		
		switch (this.options.display.errorLocation) {
			case 'before':
				error.setStyle('display', 'block');
				error.injectBefore(input);
				break;
			case 'bottom':
				error.setStyle('display', 'block');
				error.injectAfter(input);
				break;
			default:
				error.injectAfter(input);
		}
		
		error.set('morph', {
			duration: 500
		});
		
		error.morph({
			'opacity': 1	
		});
	},
	
	_hideMessage: function(input_id) {
		var error = ($('error_'+ input_id));
		
		if (error) {
			error.set('morph', {
				duration: 500,
				onComplete: function() {
					error.destroy();
				}
			});
			
			error.morph({
				'opacity': 0
			});
		}
	},
	
	_showFloatingBox: function(target, string) {
		var msg;
		var msgcontent;
		
		if (!$('form-error-'+ target)) {
			msg = new Element('div', {
				'id': 'form-error-'+ target,
				'class': this.options.floatingBox.msgClass,
				'styles': {
					'opacity': 0
				}
			});
			
			msg.set('morph', {
				duration: 500
			});
			
			msgcontent = new Element('div', {
				'id': 'form-error-msg-'+ target
			});
			
			msgcontent.inject(msg);
			msg.inject(document.body);
		} else {
			msg = $('form-error-'+ target);
			msgcontent = $('form-error-msg-'+ target);
		}
		
		msgcontent.set('html', string);
		msg.setStyle('display', 'block');
		
		var msgheight = msg.offsetHeight;
		var targetdiv = $(target);
		
		var targetheight = targetdiv.offsetHeight;
		var targetwidth = targetdiv.offsetWidth;
		var topposition = this._topPosition(targetdiv) - ((msgheight - targetheight) / 2);
		var leftposition = this._leftPosition(targetdiv) + targetwidth + this.options.floatingBox.msgOffset;
		
		msg.setStyle('top', topposition);
		msg.setStyle('left', leftposition);
		
		msg.morph({
			'opacity': 1
		});
	},
	
	_hideFloatingBox: function(target) {
		var msg = $('form-error-'+ target);
		
		msg.morph({
			'opacity': 0
		});
	},
	
	_topPosition: function(target) {
		var top = 0;

		if (target.offsetParent) {
			while (1) {
				top += target.offsetTop;

				if (!target.offsetParent) {
					break;
				}
				
				target = target.offsetParent;
			}
		} else if(target.y) {
			top += target.y;
		}

		return top;
	},
	
	_leftPosition: function(target) {
		var left = 0;
		
		if (target.offsetParent) {
			while (1) {
				left += target.offsetLeft;
				
				if (!target.offsetParent) {
					break;
				}
				
				target = target.offsetParent;
			}
		} else if (target.x) {
			left += target.x;
		}
		
		return left;
	}
});
Form.implement(new Options);