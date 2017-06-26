(function ($) {

	base_url = new RegExp(/^.*\//).exec(window.location.href)[0].replace('/administrator', '');

	/**
	 * Retorna a data atual no formato SQL yyyy-mm-dd H:i:s
	 * @returns {string}
	 */
	tCurrentDate = function () {
		var dateTime = new Date();
		var date     = dateTime.getFullYear() + '-' + ("0" + (dateTime.getMonth() + 1)).slice(-2) + '-' + dateTime.getDate();
		var time     = dateTime.getHours() + ":" + dateTime.getMinutes() + ":" + dateTime.getSeconds();

		return date + ' ' + time;
	};

	/**
	 * Retorna um parâmetro da URL
	 *
	 * @param param = o parâmetro da query string
	 * @param fromParent = Se é para verificar de uma janela pai (útil quando é verificado via iframe dentro de outra página)
	 * @returns {boolean|string}
	 */
	tGetUrlParameter = function (param, fromParent) {
		fromParent = fromParent || false;

		var window_url = (fromParent === true ? window.parent : window);

		var sPageURL      = decodeURIComponent((window_url.location.search.substring(1))),
		    sURLVariables = sPageURL.split('&'),
		    sParameterName,
		    i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === param) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};

	/**
	 * Verificar se uma variável é vazia ou não, semelhante ao empty() do php
	 *
	 * @discuss http://phpjs.org/functions/empty
	 * @param mixed_var
	 * @returns {boolean}
	 */
	tEmpty = function (mixed_var) {
		var key;
		if (mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false || mixed_var === undefined || mixed_var.length === 0) {
			return true;
		}
		if (typeof mixed_var === 'object') {
			for (key in mixed_var) {
				return false;
			}
			return true;
		}
		return false;
	};

	/**
	 * Esconder um ou mais elementos
	 *
	 * @param elementsToHide    = array de elementos que serão escondidos quando a página carregar
	 * @param checkParents      = boolean se é pra ocultar os dois parentes (útil quando quer ocultar o control-group)
	 */
	tHideElements = function (elementsToHide, checkParents) {
		// False por padrão, caso o parâmetro não tenha sido enviado
		checkParents = checkParents || false;

		$(elementsToHide).each(function (i, val) {
			var element = checkParents ? $(val).closest('.control-group') : $(val);
			element.hide();
		});
	};

	/**
	 * Adicionar a classe disabled aos campos informados no array
	 *
	 * @param elementsToDisable = array de elementos que serão desabilitados
	 * @param checkParents      = boolean se é para ocultar os dois parentes (útil quando quer ocultar o control-group)
	 */
	tDisableFields = function (elementsToDisable, checkParents) {
		// False por padrão, caso o parâmetro não tenha sido enviado
		checkParents = checkParents || false;

		$(elementsToDisable).each(function (i, val) {
			var element = checkParents ? $(val).closest('.control-group') : $(val);
			element.addClass('disabled');
			element.attr('disabled', 'true');
		})
	};

	/**
	 * Remover a classe disabled aos campos informados no array
	 *
	 * @param elementsToDisable = array de elementos que serão desabilitados
	 * @param checkParents      = boolean se é para ocultar os dois parentes (útil quando quer ocultar o control-group)
	 */
	tEnableFields = function (elementsToDisable, checkParents) {
		// False por padrão, caso o parâmetro não tenha sido enviado
		checkParents = checkParents || false;

		$(elementsToDisable).each(function (i, val) {
			var element = checkParents ? $(val).closest('.control-group') : $(val);
			element.removeClass('disabled');
			element.removeAttr('disabled');
		})
	};

	/**
	 * Esconder/exibir um ou mais elementos de acordo com o valor de um botão Yes/No
	 * Serve para ser executada on ready & on change
	 *
	 * @param fieldsetId         = id do fieldset que possui o botão Yes/No
	 *                             [ex: '#jform_notificar' possui a classe "btn-group-yesno radio"]
	 * @param labelHideElement   = texto do atributo "for" da label correspondente ao NÃO (SEM "#") para ocultar o(s)
	 *                             elemento(s) [ex: 'jform_notificar0']
	 * @param elementsToShowHide = array de elementos que serão escondidos quando o clicarem no labelHideElement
	 *                             [ex: ['#jform_notificacao_grupos']] --> Entre colchetes
	 * @param checkParents       = boolean se é pra ocultar os dois parentes (útil quando quer ocultar o control-group
	 * @param resetFields        = boolean caso deseje limpar os campos ao escondê-los.
	 */
	tShowHideElementsOnYesNoClick = function (fieldsetId, labelHideElement, elementsToShowHide, checkParents, resetFields) {

		// False por padrão, caso o parâmetro não tenha sido enviado
		checkParents = checkParents || false;
		resetFields  = resetFields || false;

		$(function ($) {
			$(fieldsetId).change(function () {
				var clickedId = $(this).find('label.active').attr('for');

				$(elementsToShowHide).each(function (i, elm) {
					var element = checkParents ? $(elm).closest('.control-group') : $(elm);

					if (clickedId === labelHideElement) {
						if (resetFields) {
							tResetFields(elm);
						}
						element.hide();
					} else {
						element.show()
					}
				});
			}).change();
		});
	};

	/**
	 * Resetar (retirar o que foi preenchido) de todos os campos dentro de determinado elemento
	 * Se for um elemento sem filhos, resetará apenas ele.
	 * @param elementId = string id do elemento [ex: '#myform']
	 */
	tResetFields = function (elementId) {

		var singleField = ['INPUT', 'SELECT', 'TEXTAREA'];

		// Se não for um campo específico, limpar todos dentro dele.
		if (singleField.indexOf($(elementId).prop("tagName")) === -1) {
			var specialElements = $(elementId).find('input:radio, input:checkbox');

			specialElements.removeAttr('checked').removeAttr('selected');
			specialElements.next().removeClass('btn-success btn-danger active');

			var normalElements = $(elementId).find('input:text, input:password, input:file, select, textarea');
			normalElements.val('').trigger('liszt:updated');

			return true;
		}

		$(elementId).val('').trigger('liszt:updated');
		$(elementId).removeAttr('checked').removeAttr('selected');
	};

	/**
	 * Alternar checkboxes de acordo com o seu valor [ex: ao marcar SIM em uma, a outra deverá ser marcada como NÃO]
	 *
	 * @param fieldSetId            = id do fieldset que contém os botões de yes e no
	 * @param classesToCheck        = classes para serem verificadas se a label principal possui ou não, com pontos [ex: ".active .btn-success .btn-danger .btn-primary]
	 * @param classesToAddOrRemove  = classes para serem adicionadas ou removidas, sem pontos e sem vírgulas [ex: "active btn-success btn-danger btn-primary]
	 * @param labelToCheck          = label a ser verificada se possui as classesToAddOrRemove [ex: 'jform_retirada0']
	 * @param labelOnText1          = texto do atributo "for" da label correspondente ao SIM (SEM "#") a ser marcada como NÃO
	 * @param labelOffText1         = texto do atributo "for" da label correspondente ao NÃO (SEM "#") a ser marcada como SIM
	 */
	tChangeElementValueOnYesNo = function (fieldSetId, classesToCheck, classesToAddOrRemove, labelToCheck, labelOnText1, labelOffText1) {
		$(fieldSetId).on("click", function () {
			if ($("label[for='" + labelToCheck + "'").is(classesToCheck)) {
				$("label[for='" + labelOnText1 + "'").removeClass(classesToAddOrRemove);
				$("#" + labelOnText1).prop("checked", false);
				$("label[for='" + labelOffText1 + "'").addClass(classesToAddOrRemove);
				$("#" + labelOffText1).prop("checked", true);
			} else {
				$("label[for='" + labelOffText1 + "'").removeClass(classesToAddOrRemove);
				$("#" + labelOffText1).prop("checked", false);
				$("label[for='" + labelOnText1 + "'").addClass(classesToAddOrRemove);
				$("#" + labelOnText1).prop("checked", true);
			}
		});
	};


	/**
	 * SELECTS
	 */


	/**
	 * Selecionar um ou mais valores em um Multiple select
	 * @param {string} nameField
	 * @param {array} values = ex: ["10", "11"]
	 */
	tSelectValuesMultipleSelect = function (nameField, values) {
		$(nameField).val(values).trigger("liszt:updated");
	};

	/**
	 * Método para renderizar selects com múltiplas opções
	 *
	 * @param nameView = string nome do arquivo da view [ex: se a view for items.php, será 'items']
	 * @param nameField = name do item no XML
	 * @param idForm = id do formulário na view (sem #)
	 */
	tRenderMultipleSelect = function (nameView, nameField, idForm) {

		$(document).ready(function () {
			$('input:hidden.' + nameField).each(function () {
				var name = $(this).attr('name');
				if (name.indexOf(nameField + 'hidden')) {
					$('#jform_' + nameField + ' option[value="' + $(this).val() + '"]').attr('selected', true);
				}
			});
			$("#jform_" + nameField).trigger("liszt:updated");

		});

		Joomla.submitbutton = function (task) {
			if (task === nameView + '.cancel') {
				Joomla.submitform(task, document.getElementById(idForm));
			} else {
				if (task !== nameView + '.cancel' && document.formvalidator.isValid(document.id(idForm))) {
					if ($('#jform_' + nameField + ' option:selected').length === 0) {
						$('#jform_' + nameField + ' option[value=0]').attr('selected', 'selected');
					}
					Joomla.submitform(task, document.getElementById(idForm));
				}
				else {
					alert('Formulário inválido');
				}
			}
		}
	};


	/**
	 * STRINGS
	 */
	String.prototype.format = function () {
		var args = arguments;
		return this.replace(/{(\d+)}/g, function (match, number) {
			return !tEmpty(args[number]) ? args[number] : '';
		});
	};

	/**
	 * AJAX
	 */

	/**
	 * Previnirá o submit padrão do form e o enviará via Ajax
	 * (Com semáforo que evita double submits)
	 *
	 * @param form
	 * @param callBack
	 */
	tMakeAjaxOnFormSubmit = function (form, callBack) {

		form = tojQuery(form);

		form.submit(function (e) {
			e.preventDefault();
			tAjaxSubmitForm(form, callBack);
		});
	};

	tAjaxSubmitForm = function (form, callBack) {
		form = tojQuery(form);

		$.post(form.attr('action'), form.serialize(), function (response) {
			callBack(response);
		});
	};

	/**
	 * Função genérica para realizar um Ajax
	 *
	 * @param data = dado que será enviado
	 * @param url = url que será chamada
	 * @param method = tipo da requisição
	 * @param dataType = tipo de transmissão
	 * @param callBack = função callback que será chamada
	 */
	tMakeAjax = function (data, url, method, dataType, callBack) {
		$.ajax({
			url:      url,
			type:     method,
			data:     data,
			dataType: dataType,
			success:  function (data) {
				callBack(data);
			},
			error:    function () {
				console.log('miss');
			}
		});
	};

	tMakeAjaxPlusElement = function (data, url, callBack, element, method) {
		/* Configura a requisição AJAX */
		jQuery.noConflict().ajax({
			/* URL que será chamada */
			url:      base_url + url,
			type:     method, /* Tipo da requisição */
			data:     data, /* dado que será enviado via POST */
			dataType: 'json', /* Tipo de transmissão */
			success:  function (data) {
				callBack(data, element);
			},
			error:    function () {
				console.log('miss');
			}
		});
	};


	/**
	 * GENERAL
	 */

	var tojQuery = function (data) {
		return (data instanceof jQuery) ? data : $(data);
	};

}(window.jQuery.noConflict(), window, document));