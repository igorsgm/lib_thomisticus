function preg_quote (str, delimiter) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/preg_quote/
  // original by: booeyOH
  // improved by: Ates Goral (http://magnetiq.com)
  // improved by: Kevin van Zonneveld (http://kvz.io)
  // improved by: Brett Zamir (http://brett-zamir.me)
  // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
  //   example 1: preg_quote("$40")
  //   returns 1: '\\$40'
  //   example 2: preg_quote("*RRRING* Hello?")
  //   returns 2: '\\*RRRING\\* Hello\\?'
  //   example 3: preg_quote("\\.+*?[^]$(){}=!<>|:")
  //   returns 3: '\\\\\\.\\+\\*\\?\\[\\^\\]\\$\\(\\)\\{\\}\\=\\!\\<\\>\\|\\:'

  return (str + '')
    .replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:\\' + (delimiter || '') + '-]', 'g'), '\\$&')
}

function sql_regcase (str) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/sql_regcase/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: sql_regcase('Foo - bar.')
  //   returns 1: '[Ff][Oo][Oo] - [Bb][Aa][Rr].'

  var setlocale = require('../strings/setlocale')
  var i = 0
  var upper = ''
  var lower = ''
  var pos = 0
  var retStr = ''

  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  $locutus.php = $locutus.php || {}

  upper = $locutus.php.locales[$locutus.php.localeCategories.LC_CTYPE].LC_CTYPE.upper
  lower = $locutus.php.locales[$locutus.php.localeCategories.LC_CTYPE].LC_CTYPE.lower

  // @todo: Make this more readable
  for (i = 0; i < str.length; i++) {
    if (((pos = upper.indexOf(str.charAt(i))) !== -1) ||
      ((pos = lower.indexOf(str.charAt(i))) !== -1)) {
      retStr += '[' + upper.charAt(pos) + lower.charAt(pos) + ']'
    } else {
      retStr += str.charAt(i)
    }
  }

  return retStr
}
