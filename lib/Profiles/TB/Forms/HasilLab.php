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

    public function __construct($submitApi)
    {
        parent::__construct($submitApi);

        $this->serviceRequest = new ServiceRequest();
        $this->specimen = new Specimen();
        $this->observation = new Observation();
        $this->diagnosticReport = new DiagnosticReport();
    }

    /**
     * Sets serviceRequest
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\ServiceRequest[] $serviceRequest serviceRequest
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
     * @param \Mediator\SatuSehat\Lib\Client\Model\Specimen[] $specimens specimen
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
     * Sets diagnosticReport
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\DiagnosticReport[] $diagnosticReports diagnosticReport
     *
     * @return $this
     */
    public function setDiagnosticReports($diagnosticReports)
    {
        $this->data->setDiagnosticReport($diagnosticReports);

        return $this;
    }

    /**
     * Add diagnosticReport
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\DiagnosticReport $diagnosticReport diagnosticReport
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

    /**
     * Sets Observation
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\Observation[] $observations Observation
     *
     * @return $this
     */
    public function setObservations($observations)
    {
        $this->data->setObservation($observations);

        return $this;
    }

    /**
     * Add Observation
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\Observation $observation Obervation
     *
     * @return $this
     */
    public function addObservation($observation)
    {
        $observations = $this->data->getObservation();
        if (!$observations) {
            $observations = [$observation];
        } else {
            $observations[] = $observation;
        }
        $this->data->setObservation($observations);

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

    public function setTanggalWaktuPenerimaanContohUji($datetime)
    {
        $this->specimen->setReceivedTime($datetime . $this->submitApi->getConfig()->getTimezone());

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

        return $this;
    }

    public function setTanggalWaktuRegisterLab($datetime)
    {
        $this->diagnosticReport->setEffectiveDateTime($datetime . $this->submitApi->getConfig()->getTimezone());
        $this->observation->setEffectiveDateTime($datetime . $this->submitApi->getConfig()->getTimezone());

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
        $this->hasil->build($this);
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
        $hasilLab->setJenisContohUji($this->contoh);

        $hasilLab->getObservation()->setTypeObservation($this->jenis);
        $hasilLab->getDiagnosticReport()->setCodeReport($this->jenis);

        $hasilLab->getDiagnosticReport()->setIssued($this->tanggal);
        $hasilLab->getObservation()->setIssued($this->tanggal);

        $hasilLab->getObservation()->setLocalId($this->noregLab);

        $hasilLab->getObservation()->setNotesDetail($this->catatan);

        $hasilLab->getObservation()->setValue($this->nilai);
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
        'mtb' => 'lini_1_hasil_mtb',
        'h' => 'lini_1_hasil_h',
        'ht' => 'lini_1_hasil_ht',
        'rif' => 'lini_1_hasil_rif',
        'eto' => 'lini_1_hasil_eto',
        'pto' => 'lini_1_hasil_pto',
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

class HasilLini2 extends HasilUji
{
    protected $list = [
        'mtb' => 'xdr_hasil_mtb',
        'lfx' => 'xdr_lfxasil_h',
        'mfx' => 'xdr_hasil_mfx',
        'rif' => 'xdr_hasil_rif',
        'mfx_dt' => 'xdr_hasil_mfx_dt',
        'km' => 'xdr_hasil_km',
        'amk' => 'xdr_hasil_amk',
        'cm' => 'xdr_hasil_cm',
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

class HasilBiakan extends HasilUji
{
    public function validate($form)
    {

    }
}

class HasilKepekaan extends HasilTcmX
{
    public function validate($form)
    {

    }
}

class HasilTcmBDmax extends HasilUji
{
    public function validate($form)
    {

    }
}

class HasilPCR extends HasilUji
{
    public function validate($form)
    {

    }
}