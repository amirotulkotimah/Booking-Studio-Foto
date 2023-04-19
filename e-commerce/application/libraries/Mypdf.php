<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

require_once('assets/dompdf/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

	class Mypdf{
		protected $ci;

		public function __construct()
		{
			$this->ci =& get_instance();
		}
		public function generate($view, $data = array(), $filename = 'Invoice', $paper = 'A4', $orientation = 'portait')
		{
			$dompdf = new Dompdf();
			$html = $this->ci->load->view($view, $data, TRUE);
			$dompdf->loadHtml($html);

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper($paper, $orientation);

			// Render the HTML as PDF
			$dompdf->render();
		    ob_clean();
		    $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));

		}

	}

?>