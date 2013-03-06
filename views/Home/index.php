<?php
 	$login = new Login();
if ($login->is_logged_in()) {
	$mercury = new Mercury();
	$mercury->__call("activate", array(".contenteditable"));
}
 	

?>

<content>
	<h1 class="header contenteditable">Gut beraten - Vertrauen gewinnen</h1><br clear="all" />
    <p class="subheader contenteditable">Unter Vertrauen wird die Annahme verstanden, dass eine bestimmte Entwicklung einen positiven oder erwarteten Verlauf nimmt.<br />Dies möchte ich mit meiner Beratung bei Ihnen erreichen.</p>
    <img class="picture contenteditable" src="views/Home/img/temp.jpg" width="310" /><br clear="all" />
    <p class="text contenteditable" contenteditable="true" data-mercury="full">F�r den Bereich des Datenschutzes ist ein besonderes Vertrauensverhältnis notwendig. Deshalb möchte ich mich und meine Sichtweise zu Fragen des Datenschutzes auf den folgenden Seiten vorstellen. Ich bin Ihr kompetenter Partner in allen Fragen des betrieblichen Datenschutzes. In Dresden zu Hause – bin ich für Sie dort tätig, wo Sie meine Unterstützung und Dienstleistung in Anspruch nehmen wollen.<br />Meine besonderen Stärken liegen in der Fachberatung als externer betrieblicher Datenschutzbeauftragter. Kleine und mittelständische Unternehmen sowie Vereine gehören zu meinen Mandanten.</p>
    <p class="dosomething contenteditable">Nehmen Sie doch Kontakt mit mir auf!</p>
</content>


<script type='text/javascript'>
 	$(document).ready(function() {
 		$('content').children().click(function(e){ 
 			var str = e.currentTarget.className;
 			str = str.replace(" contenteditable","");
 			console.log(str);
 			$('.'+str).attr('contenteditable', 'true'); 
 			$('.'+str).attr('data-mercury', 'full'); 
 			$('.'+str).focus(); 
 			$('.'+str).off('click');
 		
			console.log($('window').children().children());
 			//if(window.document.getElementsByClassName('mercury-toolbar-container').item(0).style.item(1) == "none") {
 			//	Mercury.trigger('toggle:interface'); 
 			//}
 		}); 
 	}); 
 </script> 