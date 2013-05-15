/* 
 *	menu.js
 * 	Menu JavaScript
 *	Handles menu jQuery
 *OOooooOOoooo
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

$(document).ready(function(){

	function loadMenu(menu) {
		var list = $(menu).next();
		var option = ($(menu).next().find('input[name=menu-option]').val());
		var name = $(menu).text().toLowerCase().replace(/[\r\n\t\s]/g, "");
		$.ajax({
			url : 'Loader/menu_loader.php',
			type : 'POST',
			data : {
				table : name,
				option : option
			},
			success : function(data){
				list.html(data);
				list.append('<input type="hidden" name="loaded" value="true">');
			}
		});
	};

	$('[id^="menu-"]').on('click',function(){
		var loaded = ($(this).next().find('input[name=loaded]').val());
		if (!loaded) {
			loadMenu($(this));
		};
	});

	$('.dropdown-menu').on('click','li a', function(){
		var type = $(this).attr('class');
		var title = $(this).parent().find('a').text();
		console.log(title);
		type = type.split('-');

		switch(type[0]){
			case 'add':
				
				break;
			case 'submenu':
				$.ajax({
					url : 'Loader/articles_sidebar_loader.php',
					type : 'POST',
					data : {
						filter : type[1],
						table : 'articles',
						relation : 'document_id',
						title : title
					},
					success : function(data){
						$('.main-container').find('#container-articles-side-bar').html(data);
						$('.main-container').find('#container-article-content').hide('fast');
						$('.main-container').show('fast');
					},
				});	
				break;
			default:
				break;
		};
	});
	

});