$(document).ready(function () {
    // Fetch data from the server
    $.ajax({
      url: 'get-appointments.php', // Replace with the actual server endpoint URL
      method: 'GET',
      dataType: 'json',
      success: function (response) {
        // Handle the response and populate the table
        if (response && response.length > 0) {
          var tableBody = $('#appListTable tbody');
  
          response.forEach(function (appointment) {
            var row = $('<tr>');
            row.append($('<td>').text(appointment.name));
            row.append($('<td>').text(appointment.email));
            row.append($('<td>').text(appointment.number));
            row.append($('<td>').text(appointment.hname));
            row.append($('<td>').text(appointment.id));
            row.append($('<td>').text(appointment.comment));
  
            tableBody.append(row);
          });
        }
      },
      error: function (error) {
        console.error('Error retrieving appointment data:', error);
      }
    });
  });
  