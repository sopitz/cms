<?php
 	$login = new Login();
if ($login->is_logged_in()) {
	$mercury = new Mercury();
	$mercury->__call("activate", array(".contenteditable"));
}
?>



<content>
	<h1 class="header">Englisch Gut beraten - Vertrauen gewinnen</h1><br clear="all" />
    <p class="subheader">Unter Vertrauen wird die Annahme verstanden, dass eine bestimmte Entwicklung einen positiven oder erwarteten Verlauf nimmt.<br />Dies möchte ich mit meiner Beratung bei Ihnen erreichen.</p>
    <img class="picture" src="views/Home/img/temp.jpg" width="310" /><br clear="all" />
    <p class="text"="true" data-mercury="full">F�r den Bereich des Datenschutzes ist ein besonderes Vertrauensverhältnis notwendig. Deshalb möchte ich mich und meine Sichtweise zu Fragen des Datenschutzes auf den folgenden Seiten vorstellen. Ich bin Ihr kompetenter Partner in allen Fragen des betrieblichen Datenschutzes. In Dresden zu Hause – bin ich für Sie dort tätig, wo Sie meine Unterstützung und Dienstleistung in Anspruch nehmen wollen.<br />Meine besonderen Stärken liegen in der Fachberatung als externer betrieblicher Datenschutzbeauftragter. Kleine und mittelständische Unternehmen sowie Vereine gehören zu meinen Mandanten.</p>
    <p class="dosomething">bla23456 mit mir auf!</p>
</content>
