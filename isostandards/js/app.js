$(document).ready(function(){
	$.fn.editable.defaults.mode = 'inline';
	$('#container-articles-side-bar').on('click','a', function(){
		var id = $(this).attr('data');
		var name = $(this).text();
		
		//Add an article
		if(id=='add'){
			return;
		}

		$.ajax({
			url : 'Loader/article_loader.php',
			type : 'POST',
			data : {
				article : id,
				name : name
			},
			success : function(data){
				$('#container-article-content').html(data);
				$('#container-article-content').show('fast');
				$('#section-1').editable();
				$('#container-article-content').on('click','#edit-section',function(e){
					e.stopPropagation();
        			e.preventDefault();
        			$('#section-1').editable('toggle');
				});
			}
		});
	});

});