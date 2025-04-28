<?php

namespace App\Controllers;
use App\Models\AsetModel;
use App\Models\BbmModel;
use App\Models\BboModel;
use App\Models\EamtModel;
use App\Models\GasModel;
use App\Models\MappModel;
use App\Models\MaximoModel;
use App\Models\MercusuarModel;
use App\Models\MmModel;
use App\Models\NeonModel;
use App\Models\PiModel;
use App\Models\SiippModel;
use App\Models\EcModel;
use App\Models\SiditaModel;
use App\Models\PlnCerdasModel;
use App\Models\EicModel;
use App\Models\EiqcModel;
use App\Models\EtkdnModel;
use App\Models\LisdesModel;
use App\Models\PmoModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends BaseController
{
    public function generate_pembangkit()
    {
        $asetModel = new AsetModel();
        $bbmModel = new BbmModel();
        $bboModel = new BboModel();
        $gasModel = new GasModel();
        $mappModel = new MappModel();
        $maximoModel = new MaximoModel();
        $siippModel = new SiippModel();

        // Mengambil data dari berbagai metode dalam model
        $data['asetAvgUsage'] = $asetModel->getAsetAvgUsage();
        $data['asetData'] = $asetModel->countAllResults();
        $data['asetTotal'] = $asetModel->getAsetTotal();

        //Mengambil data rata-rata penggunaan dari model SiippModel
        $data['siippAvgUsage'] = $siippModel->getSiippAvgUsage();
        $data['siippData'] = $siippModel->countAllResults();
        $data['siippTotal'] = $siippModel->getSiippTotal();

        //Mengambil data rata-rata penggunaan dari model GasModel
        $data['gasAvgUsage'] = $gasModel->getGasAvgUsage();
        $data['gasData'] = $gasModel->countAllResults();
        $data['gasTotal'] = $gasModel->getGasTotal();

        //Mengambil data rata-rata penggunaan dari model BbmModel
        $data['bbmAvgUsage'] = $bbmModel->getBbmAvgUsage();
        $data['bbmData'] = $bbmModel->countAllResults();
        $data['bbmTotal'] = $bbmModel->getBbmTotal();

        //Mengambil data rata-rata penggunaan dari model BboModel
        $data['bboAvgUsage'] = $bboModel->getBboAvgUsage();
        $data['bboData'] = $bboModel->countAllResults();
        $data['bboTotal'] = $bboModel->getBboTotal();

        //Mengambil data rata-rata penggunaan dari model MaximoModel
        $data['maximoAvgUsage'] = $maximoModel->getMaximoAvgUsage();
        $data['maximoData'] = $maximoModel->countAllResults();
        $data['maximoTotal'] = $maximoModel->getMaximoTotal();

        //Mengambil data rata-rata penggunaan dari model MappModel
        $data['mappAvgUsage'] = $mappModel->getMappAvgUsage();
        $data['mappData'] = $mappModel->countAllResults();
        $data['mappTotal'] = $mappModel->getMappTotal();

        $html = view('pdf/pdf_pembangkit', $data);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('dashboard_report.pdf', ['Attachment' => 0]);
    }

    public function generate_transmisi()
    {
        $eamtModel = new EamtModel();
        $piModel = new PiModel();
        $neonModel = new NeonModel();
        $mmModel = new mmModel();

        //Mengambil data rata-rata penggunaan dari model EamtModel
        $data['eamtAvgUsage'] = $eamtModel->getEamtAvgUsage();
        $data['eamtData'] = $eamtModel->countAllResults();
        $data['eamtTotal'] = $eamtModel->getEamtTotal();

        //Mengambil data rata-rata penggunaan dari model PiModel
        $data['piAvgUsage'] = $piModel->getPiAvgUsage();
        $data['piData'] = $piModel->countAllResults();
        $data['piTotal'] = $piModel->getPiTotal();

        //Mengambil data rata-rata penggunaan dari model NeonModel
        $data['neonAvgUsage'] = $neonModel->getNeonAvgUsage();
        $data['neonData'] = $neonModel->countAllResults();
        $data['neonTotal'] = $neonModel->getNeonTotal();
        
        //Mengambil data rata-rata penggunaan dari model MmModel
        $data['mmAvgUsage'] = $mmModel->getMmAvgUsage();
        $data['mmData'] = $mmModel->countAllResults();
        $data['mmTotal'] = $mmModel->getMmTotal();

        $html = view('pdf/pdf_transmisi', $data);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('dashboard_report.pdf', ['Attachment' => 0]);
    }

    public function generate_proyek()
    {
        $ecModel = new EcModel();
        $eicModel = new EicModel();
        $eiqcModel = new EiqcModel();
        $etkdnModel = new EtkdnModel();
        $lisdesModel = new LisdesModel();
        $mercusuarModel = new MercusuarModel();
        $plncerdasModel = new PlnCerdasModel();
        $pmoModel = new PmoModel();
        $siditaModel = new SiditaModel();

         //Mengambil data rata-rata penggunaan dari model 
         $data['eicAvgUsage'] = $eicModel->getEicAvgUsage();
         $data['eicData'] = $eicModel->countAllResults();
         $data['eicTotal'] = $eicModel->getEicTotal();
 
         //Mengambil data rata-rata penggunaan dari model 
         $data['ecAvgUsage'] = $ecModel->getEcAvgUsage();
         $data['ecData'] = $ecModel->countAllResults();
         $data['ecTotal'] = $ecModel->getEcTotal();
 
         //Mengambil data rata-rata penggunaan dari model 
         $data['eiqcAvgUsage'] = $eiqcModel->getEiqcAvgUsage();
         $data['eiqcData'] = $eiqcModel->countAllResults();
         $data['eiqcTotal'] = $eiqcModel->getEiqcTotal();
         
         //Mengambil data rata-rata penggunaan dari model 
         $data['mercusuarAvgUsage'] = $mercusuarModel->getMercusuarAvgUsage();
         $data['mercusuarData'] = $mercusuarModel->countAllResults();
         $data['mercusuarTotal'] = $mercusuarModel->getMercusuarTotal();
 
         //Mengambil data rata-rata penggunaan dari model 
         $data['pmoAvgUsage'] = $pmoModel->getPmoAvgUsage();
         $data['pmoData'] = $pmoModel->countAllResults();
         $data['pmoTotal'] = $pmoModel->getPmoTotal();
 
         //Mengambil data rata-rata penggunaan dari model 
         $data['siditaAvgUsage'] = $siditaModel->getSiditaAvgUsage();
         $data['siditaData'] = $siditaModel->countAllResults();
         $data['siditaTotal'] = $siditaModel->getSiditaTotal();
 
         //Mengambil data rata-rata penggunaan dari model 
         $data['plncerdasAvgUsage'] = $plncerdasModel->getPlncerdasAvgUsage();
         $data['plncerdasData'] = $plncerdasModel->countAllResults();
         $data['plncerdasTotal'] = $plncerdasModel->getPlncerdasTotal();
 
         //Mengambil data rata-rata penggunaan dari model 
         $data['etkdnAvgUsage'] = $etkdnModel->getEtkdnAvgUsage();
         $data['etkdnData'] = $etkdnModel->countAllResults();
         $data['etkdnTotal'] = $etkdnModel->getEtkdnTotal();
 
         //Mengambil data rata-rata penggunaan dari model 
         $data['lisdesAvgUsage'] = $lisdesModel->getLisdesAvgUsage();
         $data['lisdesData'] = $lisdesModel->countAllResults();
         $data['lisdesTotal'] = $lisdesModel->getLisdesTotal();

        $html = view('pdf/pdf_proyek', $data);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('dashboard_report.pdf', ['Attachment' => 0]);
    }
}
