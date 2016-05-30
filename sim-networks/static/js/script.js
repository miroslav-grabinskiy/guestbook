'use strict'

var indexScript = (function() {

	$( document ).ready(function() {
		$('form input[type="submit"]').click(function() {
			$('.feedback .errmsg').remove();

			var name = $('form input[name="name"]').val();
			var email = $('form input[name="email"]').val();
			var message = $('form textarea[name="message"]').val();
			var data = "name=" + name + "&email=" + email + "&message=" + message;

			var formError = $(this).parent().find('.error');

			$.ajax({
				type: "POST",
				url: "main/feedback",
				data: data,
				/* bad idea, need use success, error, but i havn't time*/
				success: function(msg){
					msg = JSON.parse(msg);
					console.log(msg.result);
					if (msg.result === 'success') {
						console.log(5);
						location.reload();
					} else if (msg.result === 'error') {
						for (var key in msg.errmsg) {
							$(formError).append('<p class="errmsg">' + msg.errmsg[key].toString() + '</p>');
						}
					} else {
						alert('you are hacker');
					}
				}
			});
		});

		$('.message .userinfo .delete').click(function() {
			var comment = $(this).parents('.message');
			var commentId = $(this).attr('data-delete-id');

			if (!$.isNumeric(commentId) || commentId < 0) {
				alert('wtf?');
				return;
			} 

			var data = "commentId=" + commentId;
			console.log(data);
			$.ajax({
				type: "POST",
				url: "main/delete_feedback",
				data: data,
				/* bad idea, need use success, error, but i havn't time*/
				success: function(msg){
					$(comment).remove();
					console.log(msg);
				}
			});
		});
	});

})();