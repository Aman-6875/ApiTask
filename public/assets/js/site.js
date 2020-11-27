var url = 'http://shayalawardrobe.com/site/';

function delete_cart(rowid){
	var urldata = url+"FrontEnd/delete_from_cart";
	$.ajax({
        type: "POST",
        url: urldata,
        data: {rowid},
        success:function(data){
            var obj = JSON.parse(data);
			$('#simpleCart_quantity').html(obj.rows);
            $('#simpleCart_total').html('$'+obj.total);
            
            dele_id = '#row_'+rowid;
            $(dele_id).remove();
			$('#subtotal').html(obj.total);
			$('#total').html(obj.total);
        }
    });
    
    
}

function add_cart(pro_id,qty=1){
	var urldata = url+"FrontEnd/add_to_cart";
	$.ajax({
        type: "POST",
        url: urldata,
        data: {pro_id,qty},
        success:function(data){
			var obj = JSON.parse(data);

			$('#simpleCart_quantity').html(obj.rows);
            $('#simpleCart_total').html('$'+obj.total);
        }
    });
}


function add_cart_quick(pro_id){
    qty = document.getElementById('country1').value;
    var urldata = url+"FrontEnd/add_to_cart";
    $.ajax({
        type: "POST",
        url: urldata,
        data: {pro_id,qty},
        success:function(data){
            var obj = JSON.parse(data);

            $('#simpleCart_quantity').html(obj.rows);
            $('#simpleCart_total').html('$'+obj.total);
        }
    });
}
