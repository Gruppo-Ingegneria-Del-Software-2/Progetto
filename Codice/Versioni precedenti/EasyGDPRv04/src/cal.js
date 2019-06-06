var cal = {
    list: function () {
    // list() : show calendar for selected month & year
  
      // DATA
      var data = new FormData();
      data.append('req', 'list');
      data.append('month', document.getElementById("month").value);
      data.append('year', document.getElementById("year").value);
  
      // AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/ajax-calendar.php", true);
      xhr.onload = function () {
        document.getElementById("event").innerHTML = "";
        document.getElementById("container").innerHTML = this.response;
      };
      xhr.send(data);
    },
  
    
}
    window.addEventListener("load", cal.list);