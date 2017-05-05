<?php
error_reporting(E_ERROR);
 function get_meta_contents($content)
 {
$dom = new DOMDocument;
@$dom->loadHTML($content);
 
$meta_tags = $dom->getElementsByTagName('meta');
 
//Iterate over the extracted links and display their URLs
foreach ($meta_tags as $m){
	//Extract and show the "href" attribute.
        if($m->getAttribute('name')=='keywords')
         {
          $meta['keywords']=$m->getAttribute('content');
          
          $meta['keywords']=strip_punctuation($meta['keywords']);
          $meta['keywords']=strip_symbols($meta['keywords']);
          $meta['keywords']=strip_numbers($meta['keywords']); 
         } 
         if($m->getAttribute('name')=='description')
         {
          $meta['description']=$m->getAttribute('content');
          
          $meta['description']=strip_punctuation($meta['description']);
          $meta['description']=strip_symbols($meta['description']);
          $meta['description']=strip_numbers($meta['description']); 
         } 
	//$meta_tag_contents=$link->getAttribute('content'), '<br>';
    }
$meta['keywords']=mb_strtolower($meta['keywords'], 'utf-8' );
$meta['keywords']=mb_split( ' +',$meta['keywords']);

$meta['description']=mb_strtolower($meta['description'], 'utf-8' );
$meta['description']=mb_split( ' +',$meta['description']);  
return($meta);

 }
?>
