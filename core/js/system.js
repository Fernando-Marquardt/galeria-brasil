var System = {
	window: {
		open: function(url, properties) {
			// Cria a query de propriedades da janela
			var prop = '';
			
			try {
				if (properties.width) {
					prop += ",width="+ properties.width;
					
					// Verifica posicionamento horizontal da janela
					try {
						if (properties.position.x) {
							switch (properties.position.x) {
								case 'left':
									var pos_x = 0;
									break;
								case 'center':
									var pos_x = ((screen.availWidth / 2) - (properties.width / 2));
									break;
								case 'right':
									var pos_x = (screen.availWidth - properties.width);
									break;
								default:
									var pos_x = (properties.position.x) ? properties.position.x : 0;
							}
						} else {
							var pos_x = 0;
						}
					} catch(e){}
				} else {
					var pos_x = 0;
				}
			} catch(e) {}
			
			try {
				if (properties.height) {
					prop += ",height="+ properties.height;
					
					// Verifica posicionamento vertical da janela
					try {
						if (properties.position.y) {
							switch (properties.position.y) {
								case 'top':
									var pos_y = 0;
									break;
								case 'middle':
									var pos_y = ((screen.availHeight / 2) - (properties.height / 2));
									break;
								case 'bottom':
									var pos_y = (screen.availHeight - properties.height);
									break;
								default:
									var pos_y = (properties.position.y) ? properties.position.y : 0;
							}
						} else {
							var pos_y = 0;
						}
					} catch(e) {}
				} else {
					var pos_y = 0;
				}
			} catch(e) {}
			
			try {
				if (properties.scrollbars) {
					prop += ",scrollbars="+ properties.scrollbars;
				}
			} catch(e) {}
			
			try {
				if (properties.resizable) {
					prop += ",resizable="+ properties.resizable;
				}
			} catch(e) {}
			
			prop = prop.slice(1, prop.length);
			
			try {
				var name =(properties.name) ? properties.name : 'unknow';
			} catch(e) {}

			var win = window.open(url, name, prop);
			
			win.moveTo(pos_x, pos_y);
		},
		
		close: function(win) {
			if (win) {
				win.close();
			} else {
				window.close();
			}
		}
	},
	
	redirect: function(url) {
		window.location.href = url;
	},
	
	reload: function() {
		window.location.reload();
	},
	
	back: function(param) {
		if (!param) {
			param = -1;
		}
		
		history.go(param);
	}
}
