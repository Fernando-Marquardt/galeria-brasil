window.addEvent('domready', function() {
	var tips = new Tips('.tips', {
		onShow: function(tip) {
			tip.fade('in');
		},
		onHide: function(tip) {
			tip.fade('out');
		}
	});
});
