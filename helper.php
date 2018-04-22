<?php
/**
 * Facebook Likebox Slider
 * @license    GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @link       https://jsns.eu
 */

defined('_JEXEC') or die('Direct Access to this location is not allowed.');
class modSlideLikebox {
	static function getLikebox( $params )   {
		//global $mainframe;
		require_once (JPATH_ROOT.'/modules/mod_youtube_videos/tmpl/assets/mobile_detect.php');
		$detect = new Mobile_Detect;
		if ( $detect->isMobile() ) {
			#______________________MOBILE________________________
			
			} ?>
<style>
/*mar262018*/
div#flashplayer{ width:85%; float:left;}
#video_scroll {
   /* padding-top: 14px;*/
    overflow-y: scroll;
   height: 516px !important;
    width: 15%; float:left;
    margin: 0 auto;
    background-image: url(../images/background.jpg);
}
div#video_scroll ul {
    margin: 0 !important; padding:10px !important;
}
div#video_li {
  /*  height: 95px;*/
    padding-top: 14px;
    text-align: center;
    width: 100%;
    float: left;
    border-bottom: 1px solid #fff;
}
#video_li .video-item {
    display: inline-block!important;
    margin-bottom: 8px!important;
    text-align: center!important;
    cursor: pointer!important;
    width: 620px!important;
    overflow: hidden!important;
    border-top: 1px solid #666666;
    border-bottom: 1px solid #111111!important;
    background-color: #292c31!important;
    background: #292c31 -webkit-gradient(linear, left top, left bottom, from(#494f54), to(#292c31)) no-repeat!important;
    width: auto !important;
}
.video_thumb_wrap {   width: 15%;    float: left;   text-align: center;}
.video_thread {    width: 85%;   float: left;}
.show-title-container a{color: #fff !important;text-decoration: none;}
  /*end of mar262018*/
.social_slider { z-index: 99997; -webkit-transition: right 1s ease-in-out;  -moz-transition: right 1s ease-in-out; -o-transition: right 1s ease-in-out;   transition: right 1s ease-in-out;   -webkit-backface-visibility: hidden;}
.social_slider:hover {    right: 0px;	}

@media (max-width:900px){
div#flashplayer{ width:100% !important; float:left; }
#video_scroll{ width:100% !important; float:left;     height: 120px !important;}

}
@media (max-width:500px){
iframe#myframe{     height: 280px !important;}
}
@media (max-width:1000px) and (min-width:901px){
div#flashplayer{ width:78% !important; float:left; }
#video_scroll{ width:22% !important; float:left; }

}
</style>

 <?php

if (trim($params->get('facebook')) == 1)
	{ ?><section id="content1">
		
<div id="HDVideoshare1" style="position: relative;" class="clearfix">  
    <?php
				//echo $params->get('profile_id');
                                $top_video_explode=explode("watch?v=",$params->get('profile_id'));
                                $youtube_url=$top_video_explode[0];
                                $video_url=$top_video_explode[1];
                               $embed=$youtube_url.'embed/'.$video_url.'?rel=0';
                            
				?> 

<div id="flashplayer">
    <iframe id="myframe" width="100%" height="515" src="<?php echo $embed; ?>" frameborder="0" allow="autoplay" allowfullscreen></iframe>
</div>

<div id="video_scroll" class="scrolling-wrapper">             
		<ul class="ulvideo_thumb clearfix card">
				 <div id="video_li">

						 <?php $sub_videos= $params->get('twitter_login'); 
                    $sub_video_explode=explode(",",$sub_videos);
                    error_reporting(0);

                    foreach ($sub_video_explode as $sub_video_explode_arr){
    
   //echo $vvv.'<br>';
                        $page = file_get_contents($sub_video_explode_arr);
$doc = new DOMDocument();
$doc->loadHTML($page);
libxml_use_internal_errors(true);
$title_div = $doc->getElementById('eow-title');
$title = $title_div->nodeValue;
error_reporting(0);
    $sub_video_explode=explode("watch?v=",$sub_video_explode_arr);
   // print_r ($value);
    $sub_youtube_url=$sub_video_explode[0];
                                $sub_video_url=$sub_video_explode[1];
                               $sub_embed=$sub_youtube_url.'embed/'.$sub_video_url;
          $thumbURL = 'http://img.youtube.com/vi/'.$sub_video_url.'/0.jpg';
     //echo $thumbURL.'<br>';
     
      $sub_youtube_url=$sub_video_explode[0];
                                $sub_video_url=$sub_video_explode[1];
                               $sub_embed=$sub_youtube_url.'embed/'.$sub_video_url.'?rel=0&autoplay=1';
    

//echo $title;
                                
                               
                    ?>
                     
                  <li class="card video-item featured_gutterwidth">
			<div class="video_thumb_wrap"> 
                            <a class="info_hover featured_vidimg video_link" style="cursor: pointer;" rel="htmltooltip" id="<?php echo $sub_embed ?>" onClick="myFunction(this.id);"
				> <img class="yt-uix-hovercard-target" src="<?php echo $thumbURL; ?>" width="145" height="80" title="" alt="thumb_image" />
				</a>
                         </div>
                         <div class="video_thread">
<!--				<div class="show-title-container">
					<a style="cursor: pointer;color: red;" class="show-title-gray info_hover video_link" id="<?php ///echo $sub_embed ?>" onClick="myFunction(this.id);">
                                            <?php  //echo $title; ?> </a>
				</div>
-->                         </div>
                  </li>
                    <?php
                 } ?>
				 
				 
<script>
    function myFunction(s) {
        
        var iframe1 = document.getElementById("myframe");
       // var urrl= https://www.youtube.com/embed/f3EbDbm8XqY;
       iframe1.src=s;
       }
</script>
			 </div></ul></div></div>
</section>
 	   <?php
	}


?>


</div>
<?php
	}
}
?>
