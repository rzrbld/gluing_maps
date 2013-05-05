<? 
class MapConstructor{
  function calculateImage($width,$height,$size){
    $ImageCalc['cols']=round($width/$size, 0, PHP_ROUND_HALF_UP); //calculate num of rows - width of final image / size of one piece (640 by default)
    $ImageCalc['queries']=round(($height/$size)*$ImageCalc['cols']+5, 0, PHP_ROUND_HALF_UP); //num of all queries
    return $ImageCalc;
  }

 function getPreview($size,$key,$centerN,$centerE,$zoom,$scale){
    $source="http://maps.googleapis.com/maps/api/staticmap?key=".$key."&center=".$centerE.",".$centerN."&zoom=".$zoom."&size=".$size."x".$size."&scale=".$scale."&sensor=false"; //make url
    return $source;
 }

  function makeImage($width,$height,$size,$key,$centerN,$centerE,$zoom,$scale,$ctocE,$ctocN,$queries,$cols){
    $centerNdef=$centerN; //centerN default value
    $source=array(); //array of tne links

    $ImageOut = imagecreatetruecolor ($width,$height); 
    $xcor=0;
    $ycor=0;
    for ($i=1; $i < $queries ; $i++) { 
        $source="http://maps.googleapis.com/maps/api/staticmap?key=".$key."&center=".$centerE.",".$centerN."&zoom=".$zoom."&size=".$size."x".$size."&scale=".$scale."&sensor=false"; //make url
        $tempImg = imagecreatefrompng($source); //getImg
        imagecopy ($ImageOut,$tempImg,$xcor,$ycor,0,0,imagesx($tempImg),imagesy($tempImg));  //place img on output
        imagedestroy ($tempImg); //destroy current piece
        if($i % $cols == 0  AND $i!=0) {
          $centerN=$centerNdef;
          $centerE=$centerE-$ctocE;
          $xcor=0;
          $ycor=$ycor+640;
        }else{
          $centerN=$centerN+$ctocN;
          $xcor=$xcor+$size;
        }
      }
    $filename = date("YmdHis");
    imagepng($ImageOut, "tmp/".$filename."file.png");
    return "tmp/".$filename."file.png";
  }
}

class PCREFunctions
  {
    function inputFilter($str,$type='default'){
      if(empty($str)){
        die('seems ther is no value.');
      }
      switch ($type)
      {
        case 'num':
          preg_match('/[\d]{1,10}/s', $str, $out);
          return $out['0'];
          break;
        case 'coords':
          preg_match('/[0-9]{1,7}(?:\.[0-9]{1,7})?/s', $str, $out);
          return $out['0'];
          break;
        case 'key':
          preg_match('/[0-9A-z]{32,64}/s', $str, $out);
          return $out['0'];
          break;
        default:
          $str=strip_tags($str);
          return $str;
      }
    }
  }
?>