<?php
error_reporting(E_ERROR);
function get_frames($content,$page_url)
{
 $dom = new DOMDocument;
@$dom->loadHTML($content);

$frame_tags = $dom->getElementsByTagName('frame');

//Iterate over the extracted links and display their URLs
$i=0;
//$c=0;
$frame_src=null;
foreach ($frame_tags as $f){

          $frame_src[$i]=$f->getAttribute('src');
         // echo $frame_src[$i]."<br/>";
          //if((substr_count($frame_src[$i],$page_url)==0)
           if (!preg_match('/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}'.'((:[0-9]{1,5})?\/.*)?$/i', $frame_src[$i]))
            {
              //echo $frame_src[$i]."<br/>";
                                         //  echo "okkkkkkkkk";
                if($frame_src[$i][0]!='/'||$frame_src[$i]!='.')
                  {
                      $frame_src[$i]=$page_url."/".$frame_src[$i];
                 }
                 else
                  {
                $frame_src[$i]=$page_url.$frame_src[$i];
                  }
                // $frame_src[$i]=parse_url($frame_src[$i]);
             //  echo "<br/>".$frame_src[$i]."<br/>";
            }


           $i++;


  }
return($frame_src);
}
?>
