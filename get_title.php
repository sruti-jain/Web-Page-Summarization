<?php
function get_title($content)
 {
  $content=mb_strtolower($content, 'utf-8' );
  $dom = new DOMDocument;
  @$dom->loadHTML($content); 
  $title_tags=$dom->getElementsByTagName('title');
  
 // $html_tags=$dom->getElementsByTagName('html');
     /* foreach($html_tags as $h)
             {
               foreach($h->childNodes as $c)
                      {
                         echo $c->nodeValue."<br/>";              
                      }
             }*/
  
  $title="";
foreach($title_tags as $t)
     {
        
       if($t->textContent!="")
        {
          $title.=" ".$t->textContent;
        }
     }
   //echo $title[0];
   
  
   $title=strip_punctuation($title);
   $title=strip_symbols($title);
   $title=strip_numbers($title); 
   $title=mb_strtolower($title, 'utf-8' );
     //echo "TITLE:".$title;
   $title=mb_split( ' +',$title); 
  
   return($title);
 
  //return(null);   
 }
?>
