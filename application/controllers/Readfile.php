<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Readfile extends My_controller {

    public $count = 0;
    public $path = '';
    public $pathDir = '';

	public function __construct() {
        parent::__construct();
        $this->load->helper('file');


    }

	public function index()
	{
		
	}

    
    public function gallery($id)
	{
        $this->path = __DIR__.'/../../uploads/artifact/gallery/'.$id; 
        $filenames = $this->listFolderFiles($this->path);

        $file = explode(',', $filenames);
        $cc = count($file);
        for($i=0;$i<$cc;$i++){
            echo "<img src='".base_url()."uploads/artifact/gallery/".$id."/".$file[$i]."'><br>";
        }

    }
    
	function listFolderFiles($dir){
        
        $ffs = scandir($dir);
        
        unset($ffs[array_search('.', $ffs, true)]);
        unset($ffs[array_search('..', $ffs, true)]);
        
        $unset = array('images','new-images','.DS_Store');
        
        foreach ($ffs as $key => $value) {
            if (in_array($value, $unset)) {
                unset($ffs[$key]);
            }
        }
        
                // prevent empty ordered elements
                if (count($ffs) < 1)
                    return;
                $counts = 1; 
                $filenames='';
                foreach($ffs as $ff){
                    $counts++;
                    $pathDirIn = ( empty( $this->pathDir ) ) ? '' : '/'.$this->pathDir;

                    if ( is_dir($this->path.'/'.$this->pathDir.'/'.$ff) ) {
                        //echo '<li>'.ucfirst($ff);
                        $this->pathDir = (! empty( $this->pathDir )) ? $this->pathDir.'/'.$ff : $ff;
                    }else{
                        $filenames .= $ff;
                        if(count($ffs) != $counts){
                            $filenames .= ",";
                        }
                    }
        
                }
                return $filenames;
            }

}
