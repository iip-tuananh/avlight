window.Bizweb || (window.Bizweb = {})

Bizweb.SearchOperators = {
	OR: "OR",
	AND: "AND",
	NOT: "NOT"
}

Bizweb.SearchField = function () {
	function SearchField (name) {
		this.name = name;
		this.values = [];
	}

	SearchField.prototype.addValue = function (value, operator) {
		this.values.push({ value: value, operator: operator });
	}
	SearchField.prototype.deleteValue = function (value, operator) {
		var index = -1;

		for (var i = 0; i < this.values.length; i++) {
			if(this.values[i].value === value && this.values[i].operator === operator)
				index = i;
		}

		if(index > -1)
			this.values.splice(index, 1)
	}
	SearchField.prototype.buildParam = function () {
		var value = "";

		for (var i = 0; i < this.values.length; i++) {
			if (i == 0) {
				value += this.values[i].value;
			}
			else{
				value += this._buildValue(this.values[i]);
			}
		}

		if (this.values.length > 1) {
			value = "(" + value + ")"
		}

		if(value !== "")
			return this.name + ":" + value

		return null;
	}
	SearchField.prototype._buildValue = function (value) {
		switch (value.operator.toUpperCase()){
			case Bizweb.SearchOperators.OR:
			return " OR " + value.value;
			case Bizweb.SearchOperators.AND:
			return " AND " + value.value;
			case Bizweb.SearchOperators.NOT:
			return " -" + value.value;
			default:
			return " " + value.value;
		}
	}

	SearchField.name = "SearchField";
	return SearchField;
}();