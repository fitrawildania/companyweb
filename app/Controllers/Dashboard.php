<?php
namespace App\Controllers;

use App\Controllers\BaseController;
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
use App\Models\CombinedUsageModel;
use App\Models\EcModel;
use App\Models\SiditaModel;
use App\Models\PlnCerdasModel;
use App\Models\EicModel;
use App\Models\EiqcModel;
use App\Models\EtkdnModel;
use App\Models\LisdesModel;
use App\Models\PmoModel;
use App\Models\TransmisiModel;
use App\Models\ProyekModel;
use Dompdf\Dompdf;
use Dompdf\Options;
class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $role = $session->get('role');

        switch ($role) {
            case 'proyek':
                return $this->loadData('proyek');
            case 'pembangkit':
                return $this->loadData('pembangkit');
            case 'transmisi':
                return $this->loadData('transmisi');
            case 'admin':
                return $this->loadData('admin');
            default:
                return view('/errors/html/error_403'); // Unauthorized access page
        }
    }

    public function manageUsers()
    {
        // Logika untuk mengelola pengguna
        return view('admin/manage_users');
    }

    private function loadData($role)
    {
        $data = [];

        // Inisialisasi model untuk setiap tabel yang diperlukan
        $asetModel = new AsetModel();
        $bbmModel = new BbmModel();
        $bboModel = new BboModel();
        $eamtModel = new EamtModel();
        $gasModel = new GasModel();
        $mappModel = new MappModel();
        $maximoModel = new MaximoModel();
        $mmModel = new MmModel();
        $neonModel = new NeonModel();
        $piModel = new PiModel();
        $siippModel = new SiippModel();
        $ecModel = new EcModel();
        $eicModel = new EicModel();
        $eiqcModel = new EiqcModel();
        $etkdnModel = new EtkdnModel();
        $lisdesModel = new LisdesModel();
        $mercusuarModel = new MercusuarModel();
        $plncerdasModel = new PlnCerdasModel();
        $pmoModel = new PmoModel();
        $siditaModel = new SiditaModel();

        // Model untuk view yang menggabungkan data
        // $combinedUsageModel = new CombinedUsageModel();
        // $transmisiModel = new TransmisiModel();
        // $proyekModel = new ProyekModel();
        
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

        //Mengambil data rata-rata penggunaan dari model AsetModel
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

        // Mengambil data rata-rata penggunaan dari model CombinedUsageModel
        // $data['overallAverageUsage'] = $combinedUsageModel->getOverallAverageUsage();
        // $data['averageUsageByApplication'] = $combinedUsageModel->getAverageUsageByApplication();
        // $data['averageUsageByPeriod'] = $combinedUsageModel->getAverageUsageByPeriod();

        // Mengambil data rata-rata penggunaan dari model ProyekModel
        // $data['proyekAverageUsage'] = $proyekModel->getProyekUsage();

        // Kirim data ke view sesuai role
        return view("/dashboard/$role", ['data' => $data]);
    }
}