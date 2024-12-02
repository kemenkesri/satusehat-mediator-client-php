<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\DiagnosticReport;
use Mediator\SatuSehat\Lib\Client\Model\Observation;
use Mediator\SatuSehat\Lib\Client\Model\ObservationComponent;
use Mediator\SatuSehat\Lib\Client\Model\ServiceRequest;
use Mediator\SatuSehat\Lib\Client\Model\Specimen;
use Mediator\SatuSehat\Lib\Client\Profiles\ProfileValidation;

class HasilLab extends Terduga
{
    /** @var ServiceRequest */
    protected $serviceRequest;

    /** @var Specimen */
    protected $specimen;

    /** @var Observation */
    protected $observation;

    /** @var DiagnosticReport */
    protected $diagnosticReport;

    /** @var HasilUji */
    protected $hasil;

    public function __construct($submitApi = null)
    {
        parent::__construct($submitApi);

        $this->serviceRequest = new ServiceRequest();
        $this->specimen = new Specimen();
        $this->observation = new Observation();
        $this->diagnosticReport = new DiagnosticReport();
    }

    protected function mustValidated()
    {
        return [
            'TbSuspect',
            'Encounter',
            'ServiceRequest',
            'Specimen',
            'Observation',
            'DiagnosticReport',
        ];
    }

    /**
     * Sets serviceRequest
     *
     * @param ServiceRequest[] $serviceRequest serviceRequest
     *
     * @return $this
     */
    public function setServiceRequest($serviceRequest)
    {
        $this->data->setServiceRequest($serviceRequest);

        return $this;
    }

    /**
     * Sets specimen
     *
     * @param Specimen[] $specimens specimen
     *
     * @return $this
     */
    public function setSpecimens($specimens)
    {
        $this->data->setSpecimen($specimens);

        return $this;
    }

    /**
     * Get specimen
     * 
     * @return Specimen
     */
    public function getSpecimen()
    {
        return $this->specimen;
    }

    /**
     * Add specimen
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\Specimen $specimen specimen
     *
     * @return $this
     */
    protected function addSpecimen($specimen)
    {
        if (!($specimen instanceof Specimen)) {
            $specimen = new Specimen($specimen);
        }

        $specimens = $this->data->getSpecimen();
        if (empty($specimens)) {
            $specimens = [$specimen];
        } else {
            $specimens[] = $specimen;
        }
        $this->data->setSpecimen($specimens);
        return $this;
    }

    /**
     * @return Observation
     */
    public function getObservation()
    {
        return $this->observation;    
    }

    /**
     * @return DiagnosticReport
     */
    public function getDiagnosticReport()
    {
        return $this->diagnosticReport;    
    }

    /**
     * @return HasilUji
     */
    public function getHasil()
    {
        return $this->hasil;
    }

    /**
     * Sets specimen
     *
     * @param array $specimens specimen
     *
     * @return $this
     */
    public function setSpecimen($specimens)
    {
        $this->data->setSpecimen($specimens);

        return $this;
    }

    /**
     * Sets encounter
     *
     * @param array $observation encounter
     *
     * @return $this
     */
    public function setObservation($observation)
    {
        $this->data->setObservation($observation);

        return $this;
    }

    /**
     * Sets diagnosticReport
     *
     * @param DiagnosticReport[] $diagnosticReports diagnosticReport
     *
     * @return $this
     */
    public function setDiagnosticReport($diagnosticReports)
    {
        $this->data->setDiagnosticReport($diagnosticReports);

        return $this;
    }

    /**
     * Add diagnosticReport
     *
     * @param DiagnosticReport $diagnosticReport diagnosticReport
     *
     * @return $this
     */
    public function addDiagnosticReport($diagnosticReport)
    {
        $diagnosticReports = $this->data->getDiagnosticReport();
        if (!$diagnosticReports) {
            $diagnosticReports = [$diagnosticReport];
        } else {
            $diagnosticReports[] = $diagnosticReport;
        }
        $this->data->setDiagnosticReport($diagnosticReports);

        return $this;
    }

    public function setJenisPemeriksaan($jenisLab)
    {
        $this->serviceRequest->setCodeRequest($jenisLab);
        $codes = $this->specimen->getCodeRequest();
        if (empty($codes)) {
            $codes = [$jenisLab];
        } elseif (!in_array($jenisLab, $codes)) {
            $codes[] = $jenisLab;
        }
        $this->specimen->setCodeRequest($codes);

        $this->diagnosticReport->setServiceRequest($jenisLab);

        switch ($jenisLab) {
            case 'mikroskopis':
                $this->hasil = new HasilMikroskopis();
                break;
            case 'tcm':
                $this->hasil = new HasilTcm();
                break;
            case 'tcm_xdr':
                $this->hasil = new HasilTcmXdr();
                break;
            case 'lini_1':
                $this->hasil = new HasilLini1();
                break;
            case 'lini_2':
                $this->hasil = new HasilLini2();
                break;
            case 'biakan':
            case 'biakan_jl':
            case 'biakan_mgit':
                $this->hasil = new HasilBiakan();
                break;
            case 'kepekaan':
                $this->hasil = new HasilKepekaan();
                break;
            case 'tcm_bdmax':
                $this->hasil = new HasilTcmBDmax();
                break;
            case 'pcr':
                $this->hasil = new HasilPCR();
                break;
        }

        return $this;
    }

    public function setJenisContohUji($jenis)
    {
        $this->specimen->setTypeCode($jenis);

        return $this;
    }

    public function setJenisContohUjiLainnya($detail)
    {
        $this->specimen->setTypeDetail($detail);

        return $this;
    }

    public function setSpesimenId($id, $name)
    {
        $this->specimen->setId($id);
        $this->specimen->setReference($name);
        $this->observation->setSpecimen($name);
        $this->diagnosticReport->setSpecimen($name);
        $this->specimen->setShouldUpdate(true);
        $this->specimen->setStatus('available');

        return $this;
    }

    public function setServiceRequestId($id)
    {
        $this->serviceRequest->setId($id);

        return $this;
    }

    public function setTanggalWaktuPenerimaanContohUji($datetime)
    {
        $this->specimen->setReceivedTime(self::isoDate($datetime, $this->config->getTimezone()));

        return $this;
    }

    public function setKonfirmasiContohUji($kondisi, $detail = null)
    {
        $this->specimen->setCondition($kondisi);
        if ($detail) {
            $this->specimen->setConditionDetail($detail);
        }

        return $this;
    }

    public function setPenerimaContohUji($idNakes)
    {
        $this->observation->setPerformer($idNakes);
        $this->serviceRequest->setRequester($idNakes);
        $this->serviceRequest->setRequesterType('Practitioner');
        return $this;
    }

    public function setFasyankesTujuan($fasyankes_id)
    {
        $this->serviceRequest->setFaskesTujuan($fasyankes_id);
        return $this;
    }

    public function setTanggalWaktuRegisterLab($datetime)
    {
        $this->diagnosticReport->setEffectiveDateTime(self::isoDate($datetime, $this->config->getTimezone()));
        $this->observation->setEffectiveDateTime(self::isoDate($datetime, $this->config->getTimezone()));

        return $this;
    }

    public function setDokterPemeriksaLab($idNakes)
    {
        $this->diagnosticReport->setVerifiedby($idNakes);

        return $this;
    }

    public function setPermohonanLabId($labId)
    {
        $this->data->getTbSuspect()->setLabId($labId);
        $this->serviceRequest->setId($labId);

        return $this;
    }

    /**
     * 
     * @return HasilUji
     */
    public function getHasilUji()
    {
        return $this->hasil;
    }

    public function build()
    {
        parent::build();

        $this->hasil->build($this);

        $this->setJenisContohUji($this->hasil->getContoh());

        $this->observation->setTypeObservation($this->hasil->getJenis());
        $this->observation->setDiagnosticReport($this->hasil->getJenis());
        $this->diagnosticReport->setCodeReport($this->hasil->getJenis());

        $this->diagnosticReport->setIssued(self::isoDate($this->hasil->getTanggal(), $this->config->getTimezone()));
        $this->observation->setIssued(self::isoDate($this->hasil->getTanggal(), $this->config->getTimezone()));

        if ($this->hasil->getNoregLab())
            $this->observation->setLocalId($this->hasil->getNoregLab());

        $this->observation->setNotesDetail($this->hasil->getCatatan());

        $this->observation->setValue($this->hasil->getNilai());

        if ($this->serviceRequest->getCodeRequest()) {
            $this->setServiceRequest([$this->serviceRequest]);
        }
        if ($this->specimen->getCodeRequest()) {
            $this->setSpecimens([$this->specimen]);
        }
        if ($this->observation->getSpecimen()) {
            $this->setObservation([$this->observation]);
        }
        if ($this->diagnosticReport->getSpecimen()) {
            $this->setDiagnosticReport([$this->diagnosticReport]);
        }

        return $this;
    }
}

abstract class HasilUji extends ProfileValidation
{
    protected $nilai;
    protected $contoh;
    protected $jenis;
    protected $tanggal;
    protected $noregLab;
    protected $catatan;
    protected $components = [];

    public function getNilai()
    {
        return $this->nilai;
    }

    public function getContoh()
    {
        return $this->contoh;
    }

    public function getJenis()
    {
        return $this->jenis;
    }

    public function getTanggal()
    {
        return $this->tanggal;
    }

    public function getNoRegLab()
    {
        return $this->noregLab;
    }

    public function getCatatan()
    {
        return $this->catatan;
    }

    public function getComponents()
    {
        return $this->components;
    }

    public function setNilai($nilai)
    {
        $this->nilai = $nilai;

        return $this;
    }

    public function setContohUji($contoh)
    {
        $this->contoh = $contoh;

        return $this;
    }

    public function setTanggalHasil($tanggal)
    {
        $this->tanggal = $tanggal;

        return $this;
    }

    public function setNomorRegistrasiLab($noregLab)
    {
        $this->noregLab = $noregLab;

        return $this;
    }

    public function setCatatan($catatan)
    {
        $this->catatan = $catatan;

        return $this;
    }

    /**
     * @param HasilLab $hasilLab
     */
    public function build($hasilLab)
    {

    }
}

class HasilMikroskopis extends HasilUji
{
    public function __construct()
    {
        $this->jenis = 'mikroskopis';
    }

    public function validate($form)
    {

    }
}

class HasilTcm extends HasilUji
{
    public function __construct()
    {
        $this->jenis = 'tcm';
    }

    public function validate($form)
    {

    }
}

abstract class HasilTcmX extends HasilTcm
{
    protected $list = [];
    protected $jenisLain;
    protected $components = [];

    public function setJenisContohUjiLain($jenisLain)
    {
        $this->jenisLain = $jenisLain;

        return $this;
    }

    /**
     * @param HasilLab $hasilLab
     */
    public function build($hasilLab)
    {
        if ($this->jenisLain) {
            $hasilLab->getSpecimen()->setTypeDetail($this->jenisLain);
        }

        $components = [];
        foreach ($this->list as $key => $type) {
            if ($this->components[$key]) {
                $mtb = new ObservationComponent();
                $mtb->setType($type)
                    ->setValue($this->components[$key]);
                $components[] = $mtb;
            }
        }

        $hasilLab->getObservation()->setComponent($components);
        parent::build($hasilLab);
    }

}

class HasilTcmXdr extends HasilTcmX
{
    protected $list = [
        'mtb' => 'xdr_hasil_mtb',
        'h' => 'xdr_hasil_h',
        'ht' => 'xdr_hasil_ht',
        'fq' => 'xdr_hasil_fq',
        'fqt' => 'xdr_hasil_fqt',
        'amk' => 'xdr_hasil_amk',
        'cm' => 'xdr_hasil_cm',
        'km' => 'xdr_hasil_km',
        'cm' => 'xdr_hasil_cm',
        'eto' => 'xdr_hasil_eto',
    ];

    public function __construct()
    {
        $this->jenis = 'tcm_xdr';
    }

    public function setMtb($mtb)
    {
        $this->components['mtb'] = $mtb;

        return $this;
    }

    public function setHDosisRendah($h)
    {
        $this->components['h'] = $h;

        return $this;
    }

    public function setH($ht)
    {
        $this->components['ht'] = $ht;

        return $this;
    }

    public function setFq($fq)
    {
        $this->components['fq'] = $fq;

        return $this;
    }

    public function setFqt($fqt)
    {
        $this->components['fqt'] = $fqt;

        return $this;
    }

    public function setAmk($amk)
    {
        $this->components['amk'] = $amk;

        return $this;
    }

    public function setKm($km)
    {
        $this->components['km'] = $km;

        return $this;
    }

    public function setCm($cm)
    {
        $this->components['cm'] = $cm;

        return $this;
    }

    public function setEto($eto)
    {
        $this->components['eto'] = $eto;

        return $this;
    }

    public function validate($form)
    {

    }
}

class HasilLini1 extends HasilTcmX
{
    protected $list = [
        'mtb' => 'lini1_hasil_mtb',
        'h' => 'lini1_hasil_h',
        'ht' => 'lini1_hasil_ht',
        'rif' => 'lini1_hasil_rif',
        'eto' => 'lini1_hasil_eto',
        'pto' => 'lini1_hasil_pto',
    ];

    public function __construct()
    {
        $this->jenis = 'lini_1';
    }

    public function setMtb($mtb)
    {
        $this->components['mtb'] = $mtb;

        return $this;
    }

    public function setHDosisRendah($h)
    {
        $this->components['h'] = $h;

        return $this;
    }

    public function setH($ht)
    {
        $this->components['ht'] = $ht;

        return $this;
    }

    public function setRifampisin($rif)
    {
        $this->components['rif'] = $rif;

        return $this;
    }

    public function setPto($pto)
    {
        $this->components['pto'] = $pto;

        return $this;
    }

    public function setEto($eto)
    {
        $this->components['eto'] = $eto;

        return $this;
    }

    public function validate($form)
    {

    }
}

class HasilLini2 extends HasilTcmX
{
    protected $list = [
        'mtb' => 'lini2_hasil_mtb',
        'lfx' => 'lini2_lfxasil_h',
        'mfx' => 'lini2_hasil_mfx',
        'rif' => 'lini2_hasil_rif',
        'mfxt' => 'lini2_hasil_mfxt',
        'km' => 'lini2_hasil_km',
        'amk' => 'lini2_hasil_amk',
        'cm' => 'lini2_hasil_cm',
    ];

    public function __construct()
    {
        $this->jenis = 'lini_2';
    }

    public function setMtb($mtb)
    {
        $this->components['mtb'] = $mtb;

        return $this;
    }

    public function setLfx($h)
    {
        $this->components['lfx'] = $h;

        return $this;
    }

    public function setMfx($ht)
    {
        $this->components['mfx'] = $ht;

        return $this;
    }

    public function setRifampisin($rif)
    {
        $this->components['rif'] = $rif;

        return $this;
    }

    public function setMfxDT($mxf)
    {
        $this->components['mfxt'] = $mxf;

        return $this;
    }

    public function setAmk($amk)
    {
        $this->components['amk'] = $amk;

        return $this;
    }

    public function setCm($cm)
    {
        $this->components['cm'] = $cm;

        return $this;
    }

    public function setKm($km)
    {
        $this->components['km'] = $km;

        return $this;
    }

    public function validate($form)
    {

    }
}

class HasilBiakan extends HasilUji
{
    protected $metode;

    /** @var Observation */
    protected $observationTestMethd;

    public function __construct()
    {
        $this->jenis = 'biakan_lj';
    }

    public function setMetodeUji($metode)
    {
        $this->metode = $metode;
        if (in_array($this->metode, ['biakan_lj', 'biakan_mgit'])) {
            $this->jenis = $this->metode;
        }

        return $this;
    }

    public function validate($form)
    {

    }
}

class HasilKepekaan extends HasilTcmX
{
    protected $list = [
        'ht' => 'hasil_kepekaan_ht',
        'h' => 'hasil_kepekaan_ha',
        'km' => 'hasil_kepekaan_km',
        'cm' => 'hasil_kepekaan_cm',
        'lfx' => 'hasil_kepekaan_lfx',
        'mfxt' => 'hasil_kepekaan_mfxt',
        'mfx' => 'hasil_kepekaan_mfx',
        'amk' => 'hasil_kepekaan_amk',
        'eto' => 'hasil_kepekaan_eto',
        'lzd' => 'hasil_kepekaan_lzd',
        'dlm' => 'hasil_kepekaan_dlm',
        'cfz' => 'hasil_kepekaan_amk',
        'bdq' => 'hasil_kepekaan_bdq',
        'ofl' => 'hasil_kepekaan_amk',
        's' => 'hasil_kepekaan_s',
        'e' => 'hasil_kepekaan_e',
        'z' => 'hasil_kepekaan_z',
    ];

    public function __construct()
    {
        $this->jenis = 'kepekaan';
    }

    public function setHt($ht)
    {
        $this->components['ht'] = $ht;

        return $this;
    }

    public function setH($h)
    {
        $this->components['h'] = $h;

        return $this;
    }

    public function setCm($eto)
    {
        $this->components['cm'] = $eto;

        return $this;
    }

    public function setKm($eto)
    {
        $this->components['km'] = $eto;

        return $this;
    }

    public function setLfx($h)
    {
        $this->components['lfx'] = $h;

        return $this;
    }

    public function setMfx($ht)
    {
        $this->components['mfx'] = $ht;

        return $this;
    }

    public function setMfxDT($mfxt)
    {
        $this->components['mfxt'] = $mfxt;

        return $this;
    }

    public function setAmk($amk)
    {
        $this->components['amk'] = $amk;

        return $this;
    }

    public function setEto($eto)
    {
        $this->components['eto'] = $eto;

        return $this;
    }

    public function setLzd($lzd)
    {
        $this->components['lzd'] = $lzd;

        return $this;
    }

    public function setDlm($dlm)
    {
        $this->components['dlm'] = $dlm;

        return $this;
    }

    public function setCfz($cfz)
    {
        $this->components['cfz'] = $cfz;

        return $this;
    }

    public function setBdq($bdq)
    {
        $this->components['bdq'] = $bdq;

        return $this;
    }

    public function setOfl($ofl)
    {
        $this->components['ofl'] = $ofl;

        return $this;
    }

    public function setS($s)
    {
        $this->components['s'] = $s;

        return $this;
    }

    public function setE($e)
    {
        $this->components['e'] = $e;

        return $this;
    }

    public function setZ($z)
    {
        $this->components['z'] = $z;

        return $this;
    }

    public function validate($form)
    {

    }
}

class HasilTcmBDmax extends HasilTcmX
{
    protected $list = [
        'mtb' => 'bdmax_hasil_mtb',
        'rif' => 'bdmax_hasil_rif',
        'inh' => 'bdmax_hasil_inh',
        'katg' => 'bdmax_hasil_katg',
        'apr' => 'bdmax_hasil_apr',
    ];

    public function __construct()
    {
        $this->jenis = 'tcm_bdmax';
    }

    public function setMtb($mtb)
    {
        $this->components['mtb'] = $mtb;

        return $this;
    }

    public function setRifampisin($rif)
    {
        $this->components['rif'] = $rif;

        return $this;
    }

    public function setInh($inh)
    {
        $this->components['inh'] = $inh;

        return $this;
    }

    public function setKatG($katg)
    {
        $this->components['katg'] = $katg;

        return $this;
    }

    public function setApr($apr)
    {
        $this->components['apr'] = $apr;

        return $this;
    }

    public function validate($form)
    {

    }
}

class HasilPCR extends HasilTcmX
{
    protected $list = [
        'mtb' => 'pcr_hasil_mtb',
        'rif' => 'pcr_hasil_rif',
        'inh' => 'pcr_hasil_inh',
        'ntm' => 'pcr_hasil_ntm',
        'katg' => 'pcr_hasil_katg',
        'apr' => 'pcr_hasil_apr',
    ];

    public function __construct()
    {
        $this->jenis = 'pcr';
    }

    public function setMtb($mtb)
    {
        $this->components['mtb'] = $mtb;

        return $this;
    }

    public function setRifampisin($rif)
    {
        $this->components['rif'] = $rif;

        return $this;
    }

    public function setInh($inh)
    {
        $this->components['inh'] = $inh;

        return $this;
    }

    public function setNtm($ntm)
    {
        $this->components['ntm'] = $ntm;

        return $this;
    }

    public function setKatG($katg)
    {
        $this->components['katg'] = $katg;

        return $this;
    }

    public function setApr($apr)
    {
        $this->components['apr'] = $apr;

        return $this;
    }

    public function validate($form)
    {

    }
}