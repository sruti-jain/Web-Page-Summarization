<?php
function get_anchor_text($content,$page_url,$status)
{
 $dom = new DOMDocument;
@$dom->loadHTML($content);
 
$anchor_tags = $dom->getElementsByTagName('a');

       
$current_page=parse_url($page_url);
//$ip_s=checkhostlist($current_page['host']);
if($status=="online")
{
$ip_s=gethostbynamel($current_page['host']);
}
//Iterate over the extracted links and display their URLs
$i=0;
$c=0;
foreach ($anchor_tags as $a){
	//Extract and show the "href" attribute.
         
          $anchor[$i]=$a->textContent;
         // echo "<br/>".$anchor[$i];
                     
          $anchor[$i]=strip_punctuation($anchor[$i]);
          $anchor[$i]=strip_symbols($anchor[$i]);
          $anchor[$i]=strip_numbers($anchor[$i]); 
          
          $anchor[$i]=mb_strtolower($anchor[$i], 'utf-8' );
          //$anchor[$i]=mb_split( ' +',$anchor[$i]); 
          $anchor_href[$i]=$a->getAttribute('href');

           //if(substr_count($anchor_href[$i],'javascript')!=0)
             //{
               //echo "#:".$anchor[$i].":URL:".$anchor_href[$i]."<br/>";
               //unset($anchor[$i]);
            // }
         
          if($anchor_href[$i][0]=='#')
             {
               //echo "#:".$anchor[$i].":URL:".$anchor_href[$i]."<br/>";
               unset($anchor[$i]);
             }
          else if($anchor_href[$i]==''||strlen($anchor[$i])==0||$anchor[$i]==' ')
             {
              // echo "blank:".$anchor[$i]."<br/>";
               unset($anchor[$i]);
             }
     else if (preg_match('/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}'.'((:[0-9]{1,5})?\/.*)?$/i', $anchor_href[$i]))
              {
                 $result=parse_url($anchor_href[$i]); 
                 if($status=="online")
                  {
                 $href_ips=gethostbynamel($result['host']);
                  }
                 // $href_ips=gethostbynamel($anchor_href[$i]);
            
                      foreach($ip_s as $ip)
                         {
                          foreach($href_ips as $hip)
                           {
                            if(ip2long($ip)==ip2long($hip))
                              {
                               $check=1; 
                               break;
                              }
                           }
                          if($check==1)
                            break;     
                         }
                       if(($check==1)||($current_page['host']==$result['host']))
                        //if($check==1) 
                         {
                             // echo "Internal:".$anchor[$i].":URL:".$anchor_href[$i]."  IP:".gethostbyname($result['host']).",HOST:".$result['host'].":IPV4:".$href_ipv4."<br/>";
                          $check=0;
                         }
                       else
                     {
                        $anchor['ext'][$c]=$anchor[$i]; 
                       // echo "External:".$anchor['ext'][$c].":URL:".$anchor_href[$i]."  IP:".gethostbyname($result['host']).",HOST:".$result['host'].":IPV4:".$href_ipv4."<br/>";
                         $c++;
                       unset($anchor[$i]);
                     } 
                                      
                   
              }
         else { 
                  //$anchor_href[$i]=$page_url.$anchor_href[$i];
                  //$r=parse_url($anchor_href[$i]);
                // echo "Internal:".$anchor[$i].":URL:".$anchor_href[$i]."  IP:".gethostbyname($current_page['host'])."<br/>";
              
              }          


 
     $i++;    
       
    }
/*for($i=1;$i<sizeof($anchor);$i++)
  {
   $anchor[$i-1]=array_combine($anchor[$i-1],$anchor[$i]);
  } */  
return($anchor);
}
?>
<?php
  function checkhostlist($domain, $port = 80, $maxipstocheck = 10) {
   $hosts = gethostbynamel($domain);
    for ($chk=0;$chk<$maxipstocheck;$chk++) {
      if (isset($hosts[$chk])) {
        $th = fsockopen($domain, $port);
        if ($th) {
          fclose($th);
          return $hosts[$chk];
          break;
        }
      }
    }
  }
?>
