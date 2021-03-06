<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class ShapeController extends Controller
{

    public function index(){
        $image = imagecreatetruecolor(250, 250); //generate image object

        $points_sq = array(
            20, // x1, top-left
            20,
    
            230, // x2, top-right
            20, // y2
    
            230, // x3, bottom-right
            230, // y3
    
            20, // x4, bottom-left
            230 // y4
        );

        $points_hex = array(
            175,38,
            75,38,
            25,125,
            75,212,
            175,212,
            225,125,
        );
      
        $color = imagecolorallocate($image, 255, 45, 255);
        $color_circle = imagecolorallocate($image, 0, 255, 255);
        $color_hex = imagecolorallocate($image, 0, 71, 75);

        imagefilledpolygon($image, $points_sq, 4, $color ); //outside square

        imagepolygon($image, $points_hex, 6, $color_hex ); //HEX
        imagefilledellipse ($image, 120, 120, 135, 135, $color_circle); //circle        
        imagerectangle($image, 80, 80, 160, 160, $color_sq2 ); //sq within circle
        
        $this->response->setHeader('Content-type', 'image/png');
        imagepng($image);
        imagedestroy($image);
    }

   

}