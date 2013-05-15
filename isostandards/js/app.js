$(document).ready(function(){
	$.fn.editable.defaults.mode = 'inline';
	$('#container-articles-side-bar').on('click','a', function(){
		var id = $(this).attr('data');
		var name = $(this).text();
		$('#container-article-content').unbind('click', '.edit-section');
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
				$('#container-article-content').hide('fast', function(){
					$(this).html(data).show('fast');
				});
				$('#container-article-content').on('click','.edit-section',function(e){
        			e.stopPropagation();
        			var section_id = $(e.target).attr('value');
        			$('#section-'+section_id).editable('show');
				});
			}
		});
	});

	$('#form-documents').find('.btn-primary').on('click', function(e){
		var form = $(this).parent().parent().find('.form-inline');
		var title = $(form).find('input[name=input-title]').val();
		var prefix = $(form).find('input[name=input-article-prefix]').val();

		$.ajax({
			url: 'Loader/insert_form_data.php',
			type : 'POST',
			data : {
				table : 'documents',
				title : title,
				prefix : prefix
			},
			success : function(data){
				console.log(data);
				$('#form-documents').modal('hide');
				$('#menu-documents').next().find('input[name=loaded]').val('false');
			}
		});

	});
});