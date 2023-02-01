$(document).ready(function () {
   
  });
  
  
  $(".delete-event").click(function(e) {
    e.preventDefault();
    alert('hello');
    bootbox.confirm("Are you sure you wish to delete this?", function(confirmed) {
        if(confirmed) {
            return true;
        }
    }); 
});
