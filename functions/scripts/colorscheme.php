<script>
//change css onclick
	function changeCSS(cssFile, cssLinkIndex) {
        var oldlink = document.getElementsByTagName("link").item(cssLinkIndex); 
        var newlink = document.createElement("link");
        newlink.setAttribute("rel", "stylesheet");
        newlink.setAttribute("type", "text/css");
        newlink.setAttribute("href", "<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/"+cssFile);		
        document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
     }
</script>