$(document).ready(function() {
    const apiKey = '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';
    
    $('#chat-input').on('keypress', function(e) {
      if(e.which === 13) {
        const message = $(this).val();
        $(this).val('');
        
        $('#chat-body').append('<div class="message user">' + message + '</div>');

        $.ajax({
          url: 'https://api.groq.com/v1/messages',
          method: 'POST',
          headers: {
            'Authorization': 'Bearer ' + apiKey,
            'Content-Type': 'application/json'
          },
          data: JSON.stringify({ text: message }),
          success: function(response) {
            $('#chat-body').append('<div class="message ai">' + response.text + '</div>');
          },
          error: function() {
            $('#chat-body').append('<div class="message ai">Error: Unable to connect to AI service.</div>');
          }
        });
      }
    });
  });