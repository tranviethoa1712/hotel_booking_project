$(function(){
   var dtToday = new Date();

   var month = dtToday.getMonth() + 1;

   var day = dtToday.getDate();

   var year = dtToday.getFullYear();

   if(month < 10)
      month = '0' + month.toString();

   if(day < 10)
   day = '0' + day.toString();

   var maxDate = year + '-' + month + '-' + day;
   $('#startDate').attr('min', maxDate);
   $('#endDate').attr('min', maxDate);
});

var oneDay = 24 * 60 * 60 * 1000;

document.getElementById('startDate').valueAsDate = new Date(new Date().getTime());
document.getElementById('endDate').valueAsDate = new Date(new Date().getTime() + oneDay * 2);
document.getElementById('startDateHidden').valueAsDate = new Date(new Date().getTime());
document.getElementById('endDateHidden').valueAsDate = new Date(new Date().getTime() + oneDay * 2);
