<?php
error_reporting(E_ERROR);
function get_heading($content)
 {
   
   $dom = new DOMDocument;
   @$dom->loadHTML($content);
 /*
$header_tags1 = $dom->getElementsByTagName('h1');
$header_tags2 = $dom->getElementsByTagName('h2');
$header_tags3 = $dom->getElementsByTagName('h3');
$header_tags4 = $dom->getElementsByTagName('h4'); 
$header_tags5 = $dom->getElementsByTagName('h5');
$header_tags6 = $dom->getElementsByTagName('h6'); 
*/
$header="";
$header_tags = $dom->getElementsByTagName('*'); 
$check=0;
 foreach($header_tags as $ht)
        {
            if($ht->tagName=='h1')
              {           
                          foreach($ht->childNodes as $h)
                               {
                                   if($h->tagName=='a') 
                                  {
                                    $check=1;
                                     break; 
                                  } 
                               
                              }
                      if($check!=1)
                        {
                          $header.=$ht->nodeValue;                
                        }
                   $check=0; 

              }
            
            else if($ht->tagName=='h2')
              {           
                          foreach($ht->childNodes as $h)
                               {
                                   if($h->tagName=='a') 
                                  {
                                    $check=1;
                                     break; 
                                  } 
                               
                              }
                      if($check!=1)
                        {
                          $header.=$ht->nodeValue;                
                        }
                   $check=0; 

              }
           else if($ht->tagName=='h3')
              {           
                          foreach($ht->childNodes as $h)
                               {
                                   if($h->tagName=='a') 
                                  {
                                    $check=1;
                                     break; 
                                  } 
                               
                              }
                      if($check!=1)
                        {
                          $header.=$ht->nodeValue;                
                        }
                   $check=0; 

              }
            else if($ht->tagName=='h4')
              {           
                          foreach($ht->childNodes as $h)
                               {
                                   if($h->tagName=='a') 
                                  {
                                    $check=1;
                                     break; 
                                  } 
                               
                              }
                      if($check!=1)
                        {
                          $header.=$ht->nodeValue;                
                        }
                   $check=0; 

              }
           else if($ht->tagName=='h5')
              {           
                          foreach($ht->childNodes as $h)
                               {
                                   if($h->tagName=='a') 
                                  {
                                    $check=1;
                                     break; 
                                  } 
                               
                              }
                      if($check!=1)
                        {
                          $header.=$ht->nodeValue;                
                        }
                   $check=0; 

              }
           else if($ht->tagName=='h6')
              {           
                          foreach($ht->childNodes as $h)
                               {
                                   if($h->tagName=='a') 
                                  {
                                    $check=1;
                                     break; 
                                  } 
                               
                              }
                      if($check!=1)
                        {
                          $header.=$ht->nodeValue;                
                        }
                   $check=0; 

              }
        }
//$i=0;
/*
$header=" ";
$check=0;
foreach($header_tags1 as $h)
     {
         foreach($header_tags1->childNodes as $hc1)
                 {
                      if($hc1->tagName=='a') 
                        {
                           $check=1;
                            break; 
                        } 
                 } 
            if($check!=1)
             {
              $header.=" ".$h->textContent;
              echo "h1".$h->textContent."<br/>";
             }
        $check=0;
     }
$check=0;
foreach($header_tags2 as $h)
     {
        foreach($header_tags2->childNodes as $hc2)
                 {
                      if($hc2->tagName=='a') 
                        {
                          echo "<h2> checked";
                           $check=1;
                            break; 
                        } 
                 } 
            if($check!=1)  
            {
             $header.=" ".$h->textContent;
              echo "h2".$h->textContent."<br/>";
            }
         $check=0;
     }
$check=0;
foreach($header_tags3 as $h)
     {
          foreach($header_tags3->childNodes as $hc3)
                 {
                      if($hc3->tagName=='a') 
                        {
                           $check=1;
                            break; 
                        } 
                 } 
            if($check!=1)
              {
             $header.=" ".$h->textContent;
             echo "h3".$h->textContent."<br/>";
              }
          $check=0;
     }
$check=0;
foreach($header_tags4 as $h)
     {
       foreach($header_tags4->childNodes as $hc4)
                 {
                      if($hc4->tagName=='a') 
                        {
                           $check=1;
                            break; 
                        } 
                 } 
            if($check!=1)
             {
              $header.=" ".$h->textContent;
              echo "h4".$h->textContent."<br/>";
             }
        $check=0;
     }
$check=0;
foreach($header_tags5 as $h)
     {
          foreach($header_tags5->childNodes as $hc5)
                 {
                      if($hc5->tagName=='a') 
                        {
                           $check=1;
                            break; 
                        } 
                 } 
            if($check!=1)
             {
              $header.=" ".$h->textContent;
              echo "h5".$h->textContent."<br/>";
             }
        $check=0;
     }
$check=0;
foreach($header_tags6 as $h)
     {
         foreach($header_tags6->childNodes as $hc6)
                 {
                      if($hc6->tagName=='a') 
                        {
                           $check=1;
                            break; 
                        } 
                 } 
            if($check!=1)
             {
              $header.=" ".$h->textContent;
              echo "h6".$h->textContent."<br/>";
             }
         $check=0;
     }
         
*/ 
          $header=strip_punctuation($header);
          $header=strip_symbols($header);
          $header=strip_numbers($header); 
          $header=mb_strtolower($header, 'utf-8' );
$header=mb_split( ' +',$header); 

return($header);
}
?>
