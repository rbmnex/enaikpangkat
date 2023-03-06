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

    public function InlineImage($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='')
    {
        // ----- Code from FPDF->Image() -----
        // Put an image on the page
        if($file=='')
            $this->Error('Image file name is empty');
        if(!isset($this->images[$file]))
        {
            // First use of this image, get info
            if($type=='')
            {
                $pos = strrpos($file,'.');
                if(!$pos)
                    $this->Error('Image file has no extension and no type was specified: '.$file);
                $type = substr($file,$pos+1);
            }
            $type = strtolower($type);
            if($type=='jpeg')
                $type = 'jpg';
            $mtd = '_parse'.$type;
            if(!method_exists($this,$mtd))
                $this->Error('Unsupported image type: '.$type);
            $info = $this->$mtd($file);
            $info['i'] = count($this->images)+1;
            $this->images[$file] = $info;
        }
        else
            $info = $this->images[$file];

        // Automatic width and height calculation if needed
        if($w==0 && $h==0)
        {
            // Put image at 96 dpi
            $w = -96;
            $h = -96;
        }
        if($w<0)
            $w = -$info['w']*72/$w/$this->k;
        if($h<0)
            $h = -$info['h']*72/$h/$this->k;
        if($w==0)
            $w = $h*$info['w']/$info['h'];
        if($h==0)
            $h = $w*$info['h']/$info['w'];

        // Flowing mode
        if($y===null)
        {
            if($this->y+$h>$this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak())
            {
                // Automatic page break
                $x2 = $this->x;
                $this->AddPage($this->CurOrientation,$this->CurPageSize,$this->CurRotation);
                $this->x = $x2;
            }
            $y = $this->y;
            $this->y += $h;
        }

        if($x===null)
            $x = $this->x;
        $this->_out(sprintf('q %.2F 0 0 %.2F %.2F %.2F cm /I%d Do Q',$w*$this->k,$h*$this->k,$x*$this->k,($this->h-($y+$h))*$this->k,$info['i']));
        if($link)
            $this->Link($x,$y,$w,$h,$link);
        # -----------------------

        // Update Y
        $this->y += $h;
    }
}
