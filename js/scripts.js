$(function(){
  $('.social a').hover(function(){
  $(this).stop().animate({backgroundPosition:'0px 5px'},200);   
	  }, function(){
	  $(this).stop().animate({backgroundPosition:'0px 0px'},200); 		
  })
  $(".social a").easyTooltip();
  var ld = new Date();
  var ld_2 =new Array()
  var t = "Welcome, It's";
  ld_2=ld.toLocaleDateString().split(',')
  $('.date').text("Welcome, It's "+new Date().toLocaleDateString())
  if(!checkFlash()){
	$(".noflash").show();
	$(".flash").hide();
  }
});

function checkFlash(){
	var hasFlash = false;
	try {
	  var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
	  if (fo) {
		hasFlash = true;
	  }
	} catch (e) {
	  if (navigator.mimeTypes
			&& navigator.mimeTypes['application/x-shockwave-flash'] != undefined
			&& navigator.mimeTypes['application/x-shockwave-flash'].enabledPlugin) {
		hasFlash = true;
	  }
	}
        return hasFlash;
}