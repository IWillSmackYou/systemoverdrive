
/*$(".inputss").keyup(function () {
   if (this.value.length == this.maxLength) {
     $(this).nextAll('.inputs:enabled:first').focus();
   }
});*/
$(".inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.inputs').focus();
    }
});
