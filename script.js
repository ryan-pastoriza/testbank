$(document).ready(function(){
	$("#reply").on("click", function(){
		var message = $.trim($("#message").val()),
			conver_id = $.trim($("#conver_id").val()),
			from_user = $.trim($("#from_user").val()),
			to_user = $.trim($("#to_user").val()),
			error = $("#error");
		if((message != "") && (conver_id != "") && (from_user != "") && (to_user != "")){
			error.text("Sending...");
			$.post("post_message_ajax.php",{message:message,conver_id:conver_id,from_user:from_user,to_user:to_user}, function(data){
				error.text(data);
				$("#message").val("");
			});
		}
	});
	conver_id = $("#conver_id").val();
	var get =setInterval(function(){

		$(".direct-chat-msg" ).load("get_message_ajax.php?conver_id="+conver_id);
	}, 8000);

	$(".display-chat-info").scrollTop(clearInterval(get));
});

