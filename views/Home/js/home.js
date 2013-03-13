 		$('content').children().click(function(e){ 
 			var str = e.currentTarget.className;
 			//str = str.replace(" contenteditable","");
 			//console.log(str);
 			$('.'+str).attr('contenteditable', 'true'); 
 			$('.'+str).attr('data-mercury', 'full'); 
 			$('.'+str).focus(); 
 			$('.'+str).off('click');
 			
			console.log($('window').children().children());
 			//if(window.document.getElementsByClassName('mercury-toolbar-container').item(0).style.item(1) == "none") {
 			Mercury.trigger('toggle:interface'); 
 			//}
 		}); 