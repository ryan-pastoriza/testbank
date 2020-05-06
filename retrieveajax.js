function countMsg(type, msg, id1, id2) {
	$('.'+id1).html(0);
	$('.'+id2).html(0);
	$('.'+id1).html(msg);
	$('.'+id2).html(msg);

}

function addMsg(displayid, data, type) {
	$('#'+displayid).html("<ul class='menu'>"+data+"</ul>"); 
}

$(document).ready(function() {
	waitForMsg('instructcountnotif.php');
});

function waitForMsg(url) {
	$.ajax({
		type: "GET",
		url: url,
		async: true,
		cache: false,
		success: function(data) {
			var count = 0;
			data = JSON.parse(data);
			$.each(data, function(k, v){
			   
				if(v.message.length >= 1){
					var element =  "";
					
					$.each(v.message, function(key, value){

						element += "<li>\
										<a href='#'>\
											<h4>\
												"+value.username+"\
											</h4> \
										</a>\
									</li>";
						addMsg(k, element, k);
						
					})
				}
				countMsg("new", v.count, k, k+'-span');
			})
			

			setTimeout(function(){ 
				waitForMsg('instructcountnotif.php'); 
			}, 1000);
		}
	});
};
   



