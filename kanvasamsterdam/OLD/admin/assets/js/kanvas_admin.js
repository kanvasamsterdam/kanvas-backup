
var select_images = function(){
	var img_location = './../assets/user_images/';
	$$('.image_preview').each(function(imgObj){
		imgObj.addEvent('click',function(){
			$$('.image_preview.selected').removeClass('selected');
			imgObj.addClass('selected');
			img_filename = imgObj.get('filename');
			img_src = img_location + img_filename;
			$('e_img').set('filename',img_filename);
			$('e_img').set('src',img_src);
		});
	});
};

var show_preview = function(){
	$('showpreview').addEvent('click',function(e){
		e.preventDefault();
		$('p_title').set('text',$('e_title').get('value'));
		$('p_img').set('src',$('e_img').get('src'));
		$('p_c1').set('html',$('e_c1').get('value').replace(/\n/g,'<br>'));
		$('p_c2').set('html',$('e_c2').get('value').replace(/\n/g,'<br>'));
	});
};

var make_link = function(){
	$('make_link').addEvent('click',function(e){
		e.preventDefault();
		link_text = $('link_in_text').get('value');
		link_url = $('link_in_link').get('value');
		link_url = link_url.replace('http://','').replace('https://','');
		link_url = 'http://'+link_url;
		
		build_link = '<a href="'+link_url+'" target="_blank">'+link_text+'</a>';
		$('link_out').set('text',build_link);
	});
	$('make_biglink').addEvent('click',function(e){
		e.preventDefault();
		link_text = $('link_in_text').get('value');
		link_url = $('link_in_link').get('value');
		link_url = link_url.replace('http://','').replace('https://','');
		link_url = 'http://'+link_url;
		
		build_link = '<a href="'+link_url+'" target="_blank"><span class="big">'+link_text+'</span></a>';
		$('link_out').set('text',build_link);
	});
};

var save_file = function(){
	$('save').addEvent('click',function(e){
		e.preventDefault();
		new Request({
			'url':'./assets/functions/save.php',
			'method' : 'post',
			'data': Object.toQueryString({
				'title': $('e_title').get('value'),
				'image'	: $('e_img').get('filename'),
				'c1' : $('e_c1').get('value').replace(/\n/g,'<br>'),
				'c2' : $('e_c2').get('value').replace(/\n/g,'<br>')
			}),
			onComplete: function(oResult){
				alert(oResult);
			}
		}).send();
	});
};

var logoff = function(){
	$('logoff').addEvent('click',function(){
		current = parent.location.href;
		current = current.replace('index.php','');
		parent.location.href = current+'assets/functions/logoff.php';
	});
};

window.addEvent('domready',function(){
	make_link();
	select_images();
	show_preview();
	save_file();
	logoff();
});