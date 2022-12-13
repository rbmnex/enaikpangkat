<?php

namespace App\Pdf;

use Codedge\Fpdf\Fpdf\Fpdf;

class PdfRender extends Fpdf {
    public static function render($view = '', $data = array(), $names = array()) {
        $filename = '';
        if(empty($names)) {
            $filename = 'Empty_Filename';
        } else {
            $iteration = 0;
            foreach($names as $name) {
                if($iteration == 0) {
                    $filename .= $name;
                } else {
                    $filename .= '_'.$name;
                }

                $iteration++;
            }
        }
        $pdf = new PdfRender();
        $pdf->AliasNbPages();
        if(empty($view)) {
            $pdf->AddPage();
        } else {
            $html= view($view,$data)->render();
            $pdf->AddPage($html);
        }
        return $pdf->Output('D',$filename,true);

    }
}
