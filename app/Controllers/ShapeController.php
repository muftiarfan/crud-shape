<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class ShapeController extends Controller
{

    public function index(){
        $image = imagecreatetruecolor(250, 250);

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
      
        $color = imagecolorallocate($image, 255, 45, 255);
        $color_circle = imagecolorallocate($image, 0, 255, 255);


        imagefilledpolygon($image, $points_sq, 4, $color );
        imagefilledellipse ($image, 120, 120, 135, 135, $color_circle);
        
        $color_sq2 = imagecolorallocate($image, 77, 90, 45);
        $color_hex = imagecolorallocate($image, 255, 255, 45);


        
        imagerectangle($image, 80, 80, 160, 160, $color_sq2 );
        $this->response->setHeader('Content-type', 'image/png');
        imagepng($image);
        imagedestroy($image);
    }

   

}