/**
 * BC
 */

function bcadd (leftOperand, rightOperand, scale) {
  //  discuss at: http://locutus.io/php/bcadd/
  // original by: lmeyrick (https://sourceforge.net/projects/bcmath-js/)
  //   example 1: bcadd('1', '2')
  //   returns 1: '3'
  //   example 2: bcadd('-1', '5', 4)
  //   returns 2: '4.0000'
  //   example 3: bcadd('1928372132132819737213', '8728932001983192837219398127471', 2)
  //   returns 3: '8728932003911564969352217864684.00'

  var bc = require('../_helpers/_bc')
  var libbcmath = bc()

  var first, second, result

  if (typeof scale === 'undefined') {
    scale = libbcmath.scale
  }
  scale = ((scale < 0) ? 0 : scale)

  // create objects
  first = libbcmath.bc_init_num()
  second = libbcmath.bc_init_num()
  result = libbcmath.bc_init_num()

  first = libbcmath.php_str2num(leftOperand.toString())
  second = libbcmath.php_str2num(rightOperand.toString())

  result = libbcmath.bc_add(first, second, scale)

  if (result.n_scale > scale) {
    result.n_scale = scale
  }

  return result.toString()
}

function bccomp (leftOperand, rightOperand, scale) {
  //  discuss at: http://locutus.io/php/bccomp/
  // original by: lmeyrick (https://sourceforge.net/projects/bcmath-js/)
  //   example 1: bccomp('-1', '5', 4)
  //   returns 1: -1
  //   example 2: bccomp('1928372132132819737213', '8728932001983192837219398127471')
  //   returns 2: -1
  //   example 3: bccomp('1.00000000000000000001', '1', 2)
  //   returns 3: 0
  //   example 4: bccomp('97321', '2321')
  //   returns 4: 1

  var bc = require('../_helpers/_bc')
  var libbcmath = bc()

  // bc_num
  var first, second
  if (typeof scale === 'undefined') {
    scale = libbcmath.scale
  }
  scale = ((scale < 0) ? 0 : scale)

  first = libbcmath.bc_init_num()
  second = libbcmath.bc_init_num()

  // note bc_ not php_str2num
  first = libbcmath.bc_str2num(leftOperand.toString(), scale)
  // note bc_ not php_str2num
  second = libbcmath.bc_str2num(rightOperand.toString(), scale)
  return libbcmath.bc_compare(first, second, scale)
}

function bcdiv (leftOperand, rightOperand, scale) {
  //  discuss at: http://locutus.io/php/bcdiv/
  // original by: lmeyrick (https://sourceforge.net/projects/bcmath-js/)
  //   example 1: bcdiv('1', '2')
  //   returns 1: '0'
  //   example 2: bcdiv('1', '2', 2)
  //   returns 2: '0.50'
  //   example 3: bcdiv('-1', '5', 4)
  //   returns 3: '-0.2000'
  //   example 4: bcdiv('8728932001983192837219398127471', '1928372132132819737213', 2)
  //   returns 4: '4526580661.75'

  var _bc = require('../_helpers/_bc')
  var libbcmath = _bc()

  var first, second, result

  if (typeof scale === 'undefined') {
    scale = libbcmath.scale
  }
  scale = ((scale < 0) ? 0 : scale)

  // create objects
  first = libbcmath.bc_init_num()
  second = libbcmath.bc_init_num()
  result = libbcmath.bc_init_num()

  first = libbcmath.php_str2num(leftOperand.toString())
  second = libbcmath.php_str2num(rightOperand.toString())

  result = libbcmath.bc_divide(first, second, scale)
  if (result === -1) {
    // error
    throw new Error(11, '(BC) Division by zero')
  }
  if (result.n_scale > scale) {
    result.n_scale = scale
  }

  return result.toString()
}

function bcmul (leftOperand, rightOperand, scale) {
  //  discuss at: http://locutus.io/php/bcmul/
  // original by: lmeyrick (https://sourceforge.net/projects/bcmath-js/)
  //   example 1: bcmul('1', '2')
  //   returns 1: '2'
  //   example 2: bcmul('-3', '5')
  //   returns 2: '-15'
  //   example 3: bcmul('1234567890', '9876543210')
  //   returns 3: '12193263111263526900'
  //   example 4: bcmul('2.5', '1.5', 2)
  //   returns 4: '3.75'

  var _bc = require('../_helpers/_bc')
  var libbcmath = _bc()

  var first, second, result

  if (typeof scale === 'undefined') {
    scale = libbcmath.scale
  }
  scale = ((scale < 0) ? 0 : scale)

  // create objects
  first = libbcmath.bc_init_num()
  second = libbcmath.bc_init_num()
  result = libbcmath.bc_init_num()

  first = libbcmath.php_str2num(leftOperand.toString())
  second = libbcmath.php_str2num(rightOperand.toString())

  result = libbcmath.bc_multiply(first, second, scale)

  if (result.n_scale > scale) {
    result.n_scale = scale
  }
  return result.toString()
}

function bcround (val, precision) {
  //  discuss at: http://locutus.io/php/bcround/
  // original by: lmeyrick (https://sourceforge.net/projects/bcmath-js/)
  //   example 1: bcround(1, 2)
  //   returns 1: '1.00'

  var _bc = require('../_helpers/_bc')
  var libbcmath = _bc()

  var temp, result, digit
  var rightOperand

  // create number
  temp = libbcmath.bc_init_num()
  temp = libbcmath.php_str2num(val.toString())

  // check if any rounding needs
  if (precision >= temp.n_scale) {
    // nothing to round, just add the zeros.
    while (temp.n_scale < precision) {
      temp.n_value[temp.n_len + temp.n_scale] = 0
      temp.n_scale++
    }
    return temp.toString()
  }

  // get the digit we are checking (1 after the precision)
  // loop through digits after the precision marker
  digit = temp.n_value[temp.n_len + precision]

  rightOperand = libbcmath.bc_init_num()
  rightOperand = libbcmath.bc_new_num(1, precision)

  if (digit >= 5) {
    // round away from zero by adding 1 (or -1) at the "precision"..
    // ie 1.44999 @ 3dp = (1.44999 + 0.001).toString().substr(0,5)
    rightOperand.n_value[rightOperand.n_len + rightOperand.n_scale - 1] = 1
    if (temp.n_sign === libbcmath.MINUS) {
      // round down
      rightOperand.n_sign = libbcmath.MINUS
    }
    result = libbcmath.bc_add(temp, rightOperand, precision)
  } else {
    // leave-as-is.. just truncate it.
    result = temp
  }

  if (result.n_scale > precision) {
    result.n_scale = precision
  }

  return result.toString()
}

function bcscale (scale) {
  //  discuss at: http://locutus.io/php/bcscale/
  // original by: lmeyrick (https://sourceforge.net/projects/bcmath-js/)
  //   example 1: bcscale(1)
  //   returns 1: true

  var _bc = require('../_helpers/_bc')
  var libbcmath = _bc()

  scale = parseInt(scale, 10)
  if (isNaN(scale)) {
    return false
  }
  if (scale < 0) {
    return false
  }
  libbcmath.scale = scale

  return true
}

function bcsub (leftOperand, rightOperand, scale) {
  //  discuss at: http://locutus.io/php/bcsub/
  // original by: lmeyrick (https://sourceforge.net/projects/bcmath-js/)
  //   example 1: bcsub('1', '2')
  //   returns 1: '-1'
  //   example 2: bcsub('-1', '5', 4)
  //   returns 2: '-6.0000'
  //   example 3: bcsub('8728932001983192837219398127471', '1928372132132819737213', 2)
  //   returns 3: '8728932000054820705086578390258.00'

  var _bc = require('../_helpers/_bc')
  var libbcmath = _bc()

  var first, second, result

  if (typeof scale === 'undefined') {
    scale = libbcmath.scale
  }
  scale = ((scale < 0) ? 0 : scale)

  // create objects
  first = libbcmath.bc_init_num()
  second = libbcmath.bc_init_num()
  result = libbcmath.bc_init_num()

  first = libbcmath.php_str2num(leftOperand.toString())
  second = libbcmath.php_str2num(rightOperand.toString())

  result = libbcmath.bc_sub(first, second, scale)

  if (result.n_scale > scale) {
    result.n_scale = scale
  }

  return result.toString()
}