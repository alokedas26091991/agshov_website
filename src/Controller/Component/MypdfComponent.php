<?php

declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * CakePHP MypdfComponent
 * @author Basant
 */
class MypdfComponent extends Component {
    
    private $_pdf;
    public function initialize(array $config): void {
        parent::initialize($config);
        if(isset($config['is_image']) && $config['is_image']==true ){
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $this->_pdf = new Dompdf($options);
        $contxt = stream_context_create([ 
        'ssl' => [ 
          'verify_peer' => FALSE, 
          'verify_peer_name' => FALSE,
          'allow_self_signed'=> TRUE
        ] 
        ]);
        $this->_pdf->setHttpContext($contxt);
        }else{
            $this->_pdf = new Dompdf();
        }
        //$this->_pdf = new Dompdf();
       // $this->_pdf->set('is_remote_enabled',true);
    }
    
    public function download($content,$invoiceno)
    {
        
        $this->_pdf->loadHtml($content);
        $this->_pdf->render();

        $output = $this->_pdf->output();
        file_put_contents(WWW_ROOT.'pdf'.DS.'Brochure.pdf', $output);
        
	$this->response->file(WWW_ROOT . 'pdf' . DS . 'Brochure.pdf', ['download' => true, 'name' => 'Invoice('.$invoiceno.').pdf']);
    }
     public function downloadcertificate($content,$name)
    {
         
        $this->_pdf->set_paper( 'A4', 'landscape' );
        $this->_pdf->loadHtml($content);
        $this->_pdf->render();
        
        $output = $this->_pdf->output(['isRemoteEnabled' => true]);
        file_put_contents(WWW_ROOT.'pdf'.DS.'Certificate.pdf', $output);
        
	$this->response->file(WWW_ROOT . 'pdf' . DS . 'Certificate.pdf', ['download' => true, 'name' => $name.'.pdf']);
    }
	public function write($content,$invoiceno)
    {
        
        $this->_pdf->loadHtml($content);
        $this->_pdf->render();

        $output = $this->_pdf->output();
        $pdfLink = WWW_ROOT . 'pdf' . DS . 'Invoice_'.time().'.pdf';
        file_put_contents($pdfLink, $output);
        
     return $pdfLink;
        
    }
}
