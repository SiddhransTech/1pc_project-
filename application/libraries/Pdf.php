<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
	public function __construct()
	{
		 parent::__construct();
	} 
	public function create($html, $filename = 'document')
    {
        $this->loadHtml($html);
        $this->setPaper('A4', 'portrait');
        $this->render();
        $this->stream($filename . ".pdf", array("Attachment" => 1));
    }
}

?>