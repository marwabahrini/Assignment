$(document).ready(function(){
    $('#generateBtn').click(function(){
        var token = 'marwaToken'; // define the token here

        $.ajax({
            url: 'http://localhost:8000/api.php', // API endpoint
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify({ action: 'get_random_number', token: token }), // include token in data
            success: function(response){
                if (response && response.number !== undefined) {
                    $('#result').html('Random number: ' + response.number);
                } else {
                    $('#result').html('Error: Invalid response from server');
                }
            },
            error: function(xhr, status, error){
                console.error(error);
                $('#result').html('Error: ' + error.responseText); // display server's response text
            }
        });
    });
});
