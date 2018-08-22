(function () {

	var ranges = document.querySelectorAll('.custom-range');
	for (var i = 0; i < ranges.length; i++)
		ranges[i].oninput = function() {
			var id = this.dataset.valor;
			var comp = document.getElementById(id);
			if (comp) {
				comp.textContent = this.value;
			}
		}
})();