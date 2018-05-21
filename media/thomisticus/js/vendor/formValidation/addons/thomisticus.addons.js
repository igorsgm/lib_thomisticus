(function ($) {
	/**
	 * Validação de CNPJ
	 */
	FormValidation.Validator.cnpj = {

		validate: function (validator, $field, options) {
			var cnpj = $.trim($field.val());

			if ((cnpj = cnpj.replace(/[^\d]/g, "")).length != 14) {
				return false;
			}

			var b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

			if (/0{14}/.test(cnpj)) {
				return false;
			}

			for (var i = 0, n = 0; i < 12; n += cnpj[i] * b[++i]) ;
			if (cnpj[12] != (((n %= 11) < 2) ? 0 : 11 - n)) {
				return false;
			}

			for (var i = 0, n = 0; i <= 12; n += cnpj[i] * b[i++]) ;
			if (cnpj[13] != (((n %= 11) < 2) ? 0 : 11 - n)) {
				return false;
			}

			return true;
		}
	};

	/**
	 * Validação de CPF
	 */
	FormValidation.Validator.cpf = {

		validate: function (validator, $field, options) {
			var cpf = $.trim($field.val());
			cpf     = cpf.replace('.', '').replace('.', '').replace('-', '');

			if (cpf.length === 0) {
				return true;
			}

			if (cpf.length > 0) {

				if (cpf.length !== 11) {
					return false;
				}

				var partValidation = function (number) {
					return ((x = number % 11) < 2) ? 0 : 11 - x;
				};

				var a = [], b = Number(), c = 11;

				for (i = 0; i < 11; i++) {
					a[i] = cpf.charAt(i);
					if (i < 9) {
						b += (a[i] * --c);
					}
				}

				a[9] = partValidation(b);

				b = 0;
				c = 11;
				for (y = 0; y < 10; y++) {
					b += (a[y] * c--);
				}

				a[10] = partValidation(b);

				var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
				return !((cpf.charAt(9) !== a[9].toString()) || (cpf.charAt(10) !== a[10].toString()) || cpf.match(expReg));
			}

		}
	};
}(window.jQuery.noConflict(), window, document));