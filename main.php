<? include "conn.php"?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



   

    <style type="text/css">
        body { font-family:Lucida Sans, Lucida Sans Unicode, Arial, Sans-Serif;  width:1200px; font-size:13px; color:#222; text-align: center; margin:0 auto; line-height:200%}

		a:link, a:hover, a:visited
       {
           text-decoration:none; color:#3f3f3f;
       }
        p { margin:20px; padding:0;}
         
        #container { width:1200px; margin:0px auto; position:relative;   list-style:none; }
        #container li { width:479px; height:550px; position:absolute; top:0; left:0;  
               text-align:center; border:solid 1px #aaa; cursor:pointer;
               -moz-box-shadow: 0px 0px 3px #888; -webkit-box-shadow: 0px 0px 3px #888; box-shadow: 0px 0px 3px #888;
               -moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
               background:#fff url(bkg.png) repeat-x scroll left top;}
         
 
		#container li A:link {color:#333333; font-family: "돋움"; font-size: 12px; text-decoration:none} 
		#container li A:visited {color:#333333; font-family: "돋움"; font-size: 12px; text-decoration:none} 
		#container li A:active {color:#333333; text-decoration:none} 
		#container li A:hover {color:#333333; font-family:돋움; font-size:9pt; text-decoration:underline}  

        #container li.current { border:solid 1px #888; background:#fff url(bkg-current.png) repeat-x scroll left top; cursor:default;}
        #container li.current div.div_cover{ border:solid 2px #888; background:#000   repeat-x scroll left top; cursor:default; display:none;}

        
 
        
    </style>
 



 
 




   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            
            var itemWidth = $("#container li").width();
            // hide 50% of each window
            var itemPosition = itemWidth * 50 / 100;
            // slide each window 60% if its width    
            var itemMove = itemWidth * 60 / 100;        

            // move windows below eachother
            $("#container li").each(function(i) {
                $(this).attr("id", i).css("z-index", 50 + i).css("left", itemPosition * i);
            });

            $("#container li").click(function(e) {
                var currentID = parseInt($(".current").attr("id"));
                var clickedID = parseInt($(this).attr("id"));

            if (currentID != clickedID) {
                e.preventDefault();
                    var currentZ = 99;
                    var current = $(this);
                    setTimeout(function() { $(".current").removeClass("current"); current.css("z-index", currentZ).addClass("current"); }, 500);

                    if (clickedID > currentID) {
                    var i = 1;
                    var total = clickedID - currentID + 1;
                    for (j = clickedID - 1; j >= 0; j = j - 1) {
                        $("#" + j).animate({ "left": "-=" + itemMove * (i) + "px" }, 500);
                        $("#" + j).animate({ "left": "+=" + itemMove * (i) + "px" }, 300);
                        i = i + 1;
                    }
                    var i = 1;
                    setTimeout(function() {
                        for (j = clickedID - 1; j >= 0; j = j - 1) {
                            $("#" + j).css("z-index", total - i);
                            i = i + 1;
                        }
                    }, 500);
                    }
                    else {
                        var i = 1;
                        var total = $("#container li").length;
                        for (j = clickedID + 1; j <= total; j = j + 1) {
                            $("#" + j).animate({ "left": "+=" + itemMove * i + "px" }, 500);
                            $("#" + j).animate({ "left": "-=" + itemMove * i + "px" }, 300);
                            $("#" + j).css("z-index", currentZ - i);
                            i = i + 1;
                        }
                    }
                }
            });
        });
    </script>
</head>


<body >
 
    <br>

	  <ul id="container">
        <li >
			 <!-- 클릭전에는 이화면들 이 보이게 하고싶어-->
			 <div class ="div_cover"  style="position:absolute; z-index:7 ;width:470px; height:550px ;">
         <!-- 여기는 이미지 하나 !-->
        
                 <img src="./images/intro_cover.png" > 

		 </div>

		   <div  align="left" style="position:relative;  z-index:3; left:0px; top:0px; width:479px">
          <img src="./images/intro_bg.png">

		  </div>
	 
			<div align="left" style="position:absolute;   z-index:5; left:19px; top:122px;"><img src="./images/intro.png" ></div>
            <div align="left" style="position:absolute;   z-index:5; left:20px; top:143px;"><img src="./images/ceo_greeting.png" ></div>
            <div align="left" style="position:absolute;   z-index:5; left:20px; top:163px;"><img src="./images/business_scope.png" ></div>
            <div align="left" style="position:absolute;   z-index:5; left:20px; top:183px;"><img src="./images/structure.png" ></div>
            <div align="left" style="position:absolute;   z-index:5; left:20px; top:202px;"><img src="./images/coup.png" ></div>		     
             <div align="left" style="position:absolute;   z-index:5; left:20px; top:220px;"><img src="./images/location.png" ></div> 
 
 
			  

				<div align="left" style="position:absolute; width:220px; z-index:5; left:255px; top:385px; line-height:130% ;">
  		        <table border="0" cellpadding="0" cellspacing="0">
			  	<?
		

					$query="SELECT document_srl,title, last_update
							FROM xe_documents
							WHERE module_srl=103
							ORDER BY last_update DESC 							
							LIMIT 5 ";
             		$result = mysql_query($query);
//		            $rows = mysql_num_rows($result);
	
		        
				    while($temp = mysql_fetch_array($result))
					{

                        $doc_num = $temp[document_srl];
						$title =  $temp[title];
						$last_update = $temp[last_update];
                        $year = substr($last_update, 0, 4);
						$month = substr($last_update, 4, 2);
						$day = substr($last_update, 6, 2);
                        $limit="...";
						if(strlen($title > 25)) $title=substr($title, 0, 4).$limit;
						?>
						<tr><td width="2" valign="top">·</td>
						<td width="200px" valign="top"><font size="1" color="gray"> 
						<a href="http://dotmedia.kr/xe/notice/<?=$doc_num?>" target="main_iframe"><?=$title?></a></font></td>
						<!--<td valign="top"> <font size="1" color="#333333"><?=$year?>.<?=$month?>.<?=$day?></font></td>-->
						</tr>

						<?
					}

						?>
						</table>
			  </div>
 

       </li>
        <li>
		 <!-- 클릭전에는 이화면들 이 보이게 하고싶어-->
		 <div class ="div_cover"  style="position:absolute; z-index:7 ;width:470px; height:550px ;">
         <!-- 여기는 이미지 하나 !-->
                 <img src="./images/audition_cover.png" width="470px" height="550px">

		 </div>
		    <div  align="left" style="position:relative;  z-index:3; left:0px; top:0px; width:479px">
          <img src="./images/audition_bg.png">

		  </div>

		   <div  align="left" style="position:absolute;  z-index:5; left:25px; top:130px; ">
          <img src="./images/audition_menu1.png">

		  </div>

		  
		   <div  align="left" style="position:absolute;  z-index:5; left:25px; top:147px; ">
          <img src="./images/audition_menu2.png">

		  </div>

		  
		   <div  align="left" style="position:absolute;  z-index:5; left:26px; top:164px; ">
          <img src="./images/audition_menu3.png">

		  </div>

                <div align="center" style="position:absolute;   z-index:5; left:20px; top:390px;">
  		      <img src="./images/goto_audition.png"  >
			  </div>

 
  
			  </div>
			  

				<div align="left" style="position:absolute; width:220px; z-index:5; left:260px; top:385px; line-height:130% ;">
  		        <table border="0" cellpadding="0" cellspacing="0">
			  	<?
		

					$query="SELECT document_srl,title, last_update
							FROM xe_documents
							WHERE module_srl=130
							ORDER BY last_update DESC 							
							LIMIT 5 ";
             		$result = mysql_query($query);
//		            $rows = mysql_num_rows($result);
	
		        
				    while($temp = mysql_fetch_array($result))
					{

                        $doc_num = $temp[document_srl];
						$title =  $temp[title];
						$last_update = $temp[last_update];
                        $year = substr($last_update, 0, 4);
						$month = substr($last_update, 4, 2);
						$day = substr($last_update, 6, 2);
                        $limit="...";
						if(strlen($title > 25)) $title=substr($title, 0, 4).$limit;
						?>
						<tr><td width="1" valign="top">·</td>
						<td width="200px" valign="top"><font size="1" color="gray"> 
						<a href="http://dotmedia.kr/xe/notice/<?=$doc_num?>" target="main_iframe"><?=$title?></a></font></td>
						<!--<td valign="top"> <font size="1" color="#333333"><?=$year?>.<?=$month?>.<?=$day?></font></td>-->
						</tr>

						<?
					}

						?>
						</table>
			  </div>

        </li>

        <li>


     		 <!-- 클릭전에는 이화면들 이 보이게 하고싶어-->
		 <div class ="div_cover"  style="position:absolute; z-index:7 ;width:470px; height:550px ;">
         <!-- 여기는 이미지 하나 !-->
                 <img src="./images/management_cover.png" width="470px" height="550px">

		 </div>

		    <div  align="left" style="position:relative;  z-index:3; left:0px; top:0px; width:479px">
          <img src="./images/management_bg.png">

		  </div>
		 <!-- 
		 		
          <div  align="left" style="position:relative;  z-index:3; left:30px; top:80px; width:250px">
			<img src="./images/management_htitle.png">
			</div>
            
		 
 

		    
			  <div id="layer1" style="position:relative; z-index:-2; left:200px; top:120px; width:250px"  >
			 <img src="./images/management_bg.png" alt="" width="250px">
			 </div>
		    


		   <div align="left"  style="position:absolute;   z-index:4; left:30px; top:160px; " >
		   <img src="./images/management_desc.png">

		   </div>

		    <div style="position:absolute; left:50px;   z-index:4; left:0px; top:310px ">  <img src="./images/management_bottom.png"  > </div>

  -->
 
  



        </li>
        <li class="current">

		 <!-- 클릭전에는 이화면들 이 보이게 하고싶어-->
		 <div class ="div_cover"  style="position:absolute; z-index:7 ;width:470px; height:550px ;">
         <!-- 여기는 이미지 하나 !-->
                 <img src="./images/agent_cover.png" width="470px" height="550px">

		 </div>
		 <!--   -->
 
		 		
          <div  align="left" style="position:relative;  z-index:3; left:0px; top:0px; width:479px">
          <img src="./images/agent_bg.png">

		  </div>
		<!--	<img src="./images/agent_htitle.png">
			</div>
            
			<div align="left" style="position:absolute;   z-index:2; left:30px; top:140px;"><img src="./images/agent_desc1.png"></div>
           

		    
			  <div id="layer1" style="position:relative; z-index:-2; left:220px; top:0px; width:250px"  >
			 <img src="./images/agent_bg.png" alt="" width="250px">
			 </div>
		    


		   <div align="left"  style="position:absolute;   z-index:4; left:280px; top:170px; " >
		   <img src="./images/agent_desc2.png">

		   </div>

		    <div style="position:absolute; left:50px;   z-index:4; left:0px; top:310px "><img src="./images/agent_bottom.png"  > </div>-->

			 
			  

			 

     </li>
    </ul>


<!--
<center>
<table width="1200px" border="0" style="border-style:solid;border-width:0px;color:#666666;border-collapse:collapse; ">
<tr><td width="20%" valign="top">

     <table border="0" width="100%" height="100%" cellpadding="5"><tr><td align="left">&nbsp; 제유기획사<br> <hr width="100%" size="3px" color="#CCCCCC"></td></tr>
                            <tr><td align="center">배너1</td></tr>
                            <tr><td align="center">배너2</td></tr>
   </table>

    </td>
    <td width="30%"  valign="top">  
      <table border="0" width="100%" height="100%" cellpadding="5"><tr><td align="left">&nbsp;아티스트<br> <hr width="100%" size="3px" color="#CCCCCC"></td></tr>
                            <tr><td align="center"><a href="./artist/index.html" target="main_iframe">아티스트</td></tr>
                            <tr><td align="center">아티스트</td></tr>
   </table>

    </td>
	<td width="30%"  valign="top"> 
      <table border="0" width="100%" height="100%" cellpadding="5"><tr><td align="left" colspan="2">&nbsp;&nbsp;<img src="./images/interview.png">
	  <hr width="100%" size="3px" color="#CCCCCC"></td></tr>
                            <tr><td align="center">
							
						<embed src="./movie/bon.mp4" showcontrols="false" nomenu="true" width="100%"> 

							</td>
							</tr>
					 

   </table>
    </td>
	<td width="20%"  valign="top"> 
      <table border="0" width="100%" height="100%" cellpadding="5"><tr><td align="left" colspan="2">&nbsp;&nbsp;<img src="./images/community.png"> <hr width="100%" size="3px" color="#CCCCCC"></td></tr>
                            <tr>               <td align="right"><img src="./images/facebook.png" width="80px" >
							                   
											   <td align="left"><img src="./images/twitter.png" width="80px" >

							</tr>
                            <tr>    <td align="right"><img src="./images/youtube.png" width="80px"> 
							
							        </td>
									<td align="left"><img src="./images/email.png" width="80px" > 
														
							        </td>
                                  </tr>
   </table>


    </td>
</table>
 </center>
 
	-->
 <div style="position:absolute; top:600px ; z-index:300 ; left:25px;  " >
	 <img src="./images/main_bottom.png"  border="0" width="1250px" >
 
           <div  style="position:absolute; top:57px ; z-index:999999 ; left:1025px;"><img src="./images/facebook.png" width="80px" ></div>
		   <div style="position:absolute; top:57px ; z-index:999999 ; left:1129px;"><img src="./images/twitter.png" width="80px" ></div>
		   <div style="position:absolute; top:145px ; z-index:999999 ; left:1019px;"><img src="./images/youtube.png" width="90px"> </div>
		   <div style="position:absolute; top:147px ; z-index:999999 ; left:1130px;"><img src="./images/email.png" width="80px" > </div>

  </div>
 


</body>

<!-- 
<script>
    self.resizeTo(document.body.scrollWidth,900);
</script>

-->

</html>








