$(document).ready(function(){
	$('.product-color').click(function(){
		$('.product-color' + $(this).data('product')).removeClass('active');
		$('.p_img_'+ $(this).data('product')).removeClass('active');
		$('.p_img_' + $(this).data('product') + "_" + $(this).data('color')).addClass('active');
		$('.product_link_' + $(this).data('product')).attr('href',$('.product_link_' + $(this).data('product')).data('baselink') + "/" + $(this).data('color'))
		$(this).addClass('active');
	});
	$('.add-registry').click(function(){
		var product = $(this).data('product');

		var property = "";
		if($('.product-color' + product + ".active").length > 0){
			property = "color" + "," + $('.product-color' + product + ".active").data('color');
		}else{
			property = "color" + "," + $(this).data('activecolor');
		}
		var postData = {
			quantity:1,
			product:product,
			property:property,
			_token: $('#csrf_token').val()
		};

		connector.ajax({
			type:"POST",
			url:"/add_registry_item",
			data:postData
		},function(result){
			if(result.Success){
				$('.add-registry' + product).hide();
				$('.remove-registry' + product).data('registry',result.registry_id);
				$('.remove-registry' + product).show();
			}
		});
	});

	$('.remove-registry').click(function(){
		var product = $(this).data('product');
		var registry = $(this).data('registry');
		var $this = $(this);
		connector.ajax({
			type:"POST",
			url:"/remove_registry_item",
			data:{
				id:registry,
				_token: $('#csrf_token').val()
			}
		},function(result){
			if(result.Success){
				$this.removeData('registry');
				$('.add-registry' + product).show();
				$('.remove-registry' + product).hide();
			}
		});
	});

});
