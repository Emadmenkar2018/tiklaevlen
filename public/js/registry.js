$(document).ready(function(){
	$('.update-quantity').click(function(){
		var $this = $(this);
		$(this).html('Güncelleniyor...');
		var registry = $(this).data('registry');
		var product = $(this).data('product');
		var quantity = $('.quantity' + product).val();
		connector.ajax({
			type:"POST",
			url:"/update_registry_quantity",
			data:{
				id:registry,
				quantity:parseInt(quantity),
				_token:$('#csrf_token').val()
			}
		},function(result){
			$this.html('Güncelle');
			console.log(result);
		})
	});
	$('.registry-color').click(function(){
		var $this = $(this);
		var registry = $(this).data('registry');
		connector.ajax({
			type:"POST",
			url:"/update_registry_property",
			data:{
				id:registry,
				property:$(this).data('prop'),
				_token:$('#csrf_token').val()
			}
		},function(result){
			console.log(result);
		})
	});

	$('.remove-registry2').click(function(){
		var product = $(this).data('product');
		var registry = $(this).data('registry');
		$('.p_' + product + '_col').remove();
	});
});
