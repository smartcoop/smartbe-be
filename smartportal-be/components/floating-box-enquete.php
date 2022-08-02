<?php 
	if (ICL_LANGUAGE_CODE=='nl'){
		$floatingbox_enquete_txt="Vul deze <b>enquête</b> in en help ons de pagina Contact te verbeteren. 
Ze neemt minder dan 2 minuten in beslag.";
		$floatingbox_enquete_btn="Ik neem deel";
		$floatingbox_enquete_url="/nl/enquete/";		
	}else if (ICL_LANGUAGE_CODE=='fr'){
		$floatingbox_enquete_txt="Aidez-nous à améliorer la page Contact en participant à une <b>enquête</b> ; cela prend 2 minutes.";
		$floatingbox_enquete_btn="Je participe";
		$floatingbox_enquete_url="/fr/aidez-nous-a-ameliorer-la-page-contact/";
	}
?>
<div id="myDiv" class="floatingbox">
	 
	<div class="floatingbox_content">
		<div class="floatingbox_close">
			<div id="myCloseButton" onclick="myDiv.style.display = 'none';" class="floatingbox_close_btn">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5.29289 5.2929C5.68342 4.90237 6.31658 4.90237 6.70711 5.2929L12 10.5858L17.2929 5.2929C17.6834 4.90237 18.3166 4.90237 18.7071 5.2929C19.0976 5.68342 19.0976 6.31659 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31659 4.90237 5.68342 5.29289 5.2929Z" fill="#595959" />
				</svg>
			</div>
		</div>
		<div class="floatingbox_txt">
			<?php echo $floatingbox_enquete_txt;?>
			<div class="floatingbox_btn">
				<a href="<?php echo $floatingbox_enquete_url;?>"><?php echo $floatingbox_enquete_btn;?></a>
			</div>
		</div>
	</div>
  </div>