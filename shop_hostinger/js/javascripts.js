$(function() {
	var	login = $( "#login" ),
		cost = $( "#cost" ),
		coupon = $( "#coupon" ),
		bValid = true;
	
	function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "Length of " + n + " must be between " +
					min + " and " + max + "." );
				return false;
			} else {
				return true;
			}
		}
		
	function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
		
	$('#check')
	.button()
	.click(function(){
		//bValid = bValid && checkLength( login, "login", 3, 30);
		//bValid = bValid && checkLength( password, "password", 3, 30);
		
		if ( bValid ) {
			alert('ok');
					$.ajax({
						type: "POST",
						data: "a=check"+"&login=" + login.val()+"&cost=" + cost.val() + "&coupon=" + coupon.val(),
						url: "ajax.php",
						beforeSend: function() {
							$("#content").html("<img id='img-loader' src='images/ajax-loader.gif'/>");
						},
						success: function( data ) {
							alert(data);
							$("#content").html(data);
						}
					});
				login.removeClass( "ui-state-error" );		
			}
	});
});





