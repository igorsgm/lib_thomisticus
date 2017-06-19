/**
 * CTYPE
 */

function ctype_alnum (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_alnum/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_alnum('AbC12')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')
  if (typeof text !== 'string') {
    return false
  }

  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.an) !== -1
}

function ctype_alpha (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_alpha/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_alpha('Az')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')
  if (typeof text !== 'string') {
    return false
  }
  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.al) !== -1
}

function ctype_cntrl (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_cntrl/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_cntrl('\u0020')
  //   returns 1: false
  //   example 2: ctype_cntrl('\u001F')
  //   returns 2: true

  var setlocale = require('../strings/setlocale')
  if (typeof text !== 'string') {
    return false
  }
  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.ct) !== -1
}

function ctype_digit (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_digit/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_digit('150')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')
  if (typeof text !== 'string') {
    return false
  }
  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.dg) !== -1
}

function ctype_graph (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_graph/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_graph('!%')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')

  if (typeof text !== 'string') {
    return false
  }

  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.gr) !== -1
}

function ctype_lower (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_lower/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_lower('abc')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')
  if (typeof text !== 'string') {
    return false
  }

  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.lw) !== -1
}

function ctype_print (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_print/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_print('AbC!#12')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')
  if (typeof text !== 'string') {
    return false
  }
  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.pr) !== -1
}

function ctype_punct (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_punct/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_punct('!?')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')
  if (typeof text !== 'string') {
    return false
  }
  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.pu) !== -1
}

function ctype_space (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_space/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_space('\t\n')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')
  if (typeof text !== 'string') {
    return false
  }
  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.sp) !== -1
}

function ctype_upper (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_upper/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_upper('AZ')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')

  if (typeof text !== 'string') {
    return false
  }
  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.up) !== -1
}

function ctype_xdigit (text) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/ctype_xdigit/
  // original by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ctype_xdigit('01dF')
  //   returns 1: true

  var setlocale = require('../strings/setlocale')

  if (typeof text !== 'string') {
    return false
  }
  // ensure setup of localization variables takes place
  setlocale('LC_ALL', 0)

  var $global = (typeof window !== 'undefined' ? window : global)
  $global.$locutus = $global.$locutus || {}
  var $locutus = $global.$locutus
  var p = $locutus.php

  return text.search(p.locales[p.localeCategories.LC_CTYPE].LC_CTYPE.xd) !== -1
}