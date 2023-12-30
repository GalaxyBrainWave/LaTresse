
function transformNow(now) {
  function conditionalAdd0(month) {
    if (Number(month) < 10) {
      return '0' + month;
    } else {
      return month;
    }
  }
  return conditionalAdd0(now.getDate()) + '/' + conditionalAdd0(now.getMonth()) + '/' + now.getFullYear().toString().slice(2) + ' ' + now.getHours() + ':' + now.getMinutes();
}
