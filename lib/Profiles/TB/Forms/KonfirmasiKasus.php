<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare;
use Mediator\SatuSehat\Lib\Client\Model\Observation;
use Mediator\SatuSehat\Lib\Client\Model\Procedure;
use Mediator\SatuSehat\Lib\Client\Model\TbConfirm;

class KonfirmasiKasus extends Terduga
{
    /** @var EpisodeOfCare */
    protected $episodeOfCare;

    /** @var Observation */
    protected $tinggiBadan;

    /** @var TbConfirm */
    protected $konfirmasi;

    /** @var Observation */
    protected $skorTbcAnak;

    /** @var Procedure */
    protected $pemeriksaanTuberkulin;

    /** @var Observation */
    protected $hasilUjiTuberkulin;

    // RO Only
    /** @var Observation */
    protected $klasifikasiHasilKepekaan;

    public function __construct($submitApi = null)
    {
        parent::__construct($submitApi);

        $this->episodeOfCare = new EpisodeOfCare();
        $this->konfirmasi = new TbConfirm();
        $this->tinggiBadan = new Observation();
        $this->skorTbcAnak = new Observation();
        $this->pemeriksaanTuberkulin = new Procedure();
        $this->hasilUjiTuberkulin = new Observation();
        $this->klasifikasiHasilKepekaan = new Observation();
    }

    protected function mustValidated()
    {
        return [
            'TbConfirm',
            'EpisodeOfCare',
        ];
    }

    /**
     * Sets episodeId
     *
     * @param string $episodeId episodeId
     *
     * @return $this
     */
    public function setEpisodeOfCareId($episodeId)
    {
        $this->episodeOfCare->setId($episodeId);

        return $this;
    }

    /**
     * Sets tanggalRegistrasi
     *
     * @param string $tanggalRegistrasi tanggalRegistrasi
     *
     * @return $this
     */
    public function setTanggalRegistrasi($tanggalRegistrasi)
    {
        $this->episodeOfCare->setStatus('active');
        $this->episodeOfCare->setPeriodStart(self::isoDate($tanggalRegistrasi, $this->config->getTimezone()));

        return $this;
    }

    /**
     * Sets tinggiBadan
     *
     * @param string $tinggiBadan tinggiBadan
     *
     * @return $this
     */
    public function setTinggiBadan($tinggiBadan)
    {
        $this->tinggiBadan->setTypeObservation('tb');
        $this->tinggiBadan->setValue($tinggiBadan);

        return $this;
    }

    /**
     * Sets imunisasiBcg
     *
     * @param string $imunisasiBcg imunisasiBcg
     *
     * @return $this
     */
    public function setImunisasiBcg($imunisasiBcg)
    {
        $this->suspect->setImunisasiBcgId($imunisasiBcg);

        return $this;
    }

    /**
     * Sets dikirimOleh
     *
     * @param string $dikirimOleh dikirimOleh
     *
     * @return $this
     */
    public function setAsalRujukanId($dikirimOleh)
    {
        $this->konfirmasi->setAsalRujukanId($dikirimOleh);

        return $this;
    }

    /**
     * Sets tipePasienId
     *
     * @param string $tipePasienId tipePasienId
     *
     * @return $this
     */
    public function setRiwayatPengobatan($tipePasienId)
    {
        $this->suspect->setTipePasienId($tipePasienId);

        return $this;
    }

    /**
     * Sets skorTbcAnak
     *
     * @param string $skorTbcAnak skorTbcAnak
     *
     * @return $this
     */
    public function setSkorTbcAnak($skorTbcAnak)
    {
        $this->skorTbcAnak->setTypeObservation('skoring_tb');
        $this->skorTbcAnak->setValue($skorTbcAnak);

        return $this;
    }

    /**
     * Sets pemeriksaanTuberkulin
     *
     * @param string $pemeriksaanTuberkulin pemeriksaanTuberkulin
     *
     * @return $this
     */
    public function setPemeriksaanTuberkulin($pemeriksaanTuberkulin)
    {
        $this->pemeriksaanTuberkulin->setTypeCode('uji_tuberkulin');
        $this->pemeriksaanTuberkulin->setStatus($pemeriksaanTuberkulin ? 'completed' : 'not-done');

        return $this;
    }

    /**
     * Sets klasifikasiHasilKepekaan
     *
     * @param string $klasifikasiHasilKepekaan klasifikasiHasilKepekaan
     *
     * @return $this
     */
    public function setKlasifikasiHasilKepekaan($klasifikasiHasilKepekaan)
    {
        $this->klasifikasiHasilKepekaan->setTypeObservation('klasifikasi_uji_kepekaan');
        $this->klasifikasiHasilKepekaan->setValue($klasifikasiHasilKepekaan);

        return $this;
    }

    /**
     * Sets hasilUjiTuberkulin
     *
     * @param string $hasilUjiTuberkulin hasilUjiTuberkulin
     *
     * @return $this
     */
    public function setHasilUjiTuberkulin($hasilUjiTuberkulin)
    {
        $this->hasilUjiTuberkulin->setTypeObservation('tuberkulin');
        $this->hasilUjiTuberkulin->setValue($hasilUjiTuberkulin);

        return $this;
    }

    public function build()
    {
        parent::build();

        $observations = [];
        if ($this->tinggiBadan->getValue()) {
            $observations[] = $this->tinggiBadan;
        }
        if ($this->skorTbcAnak->getValue()) {
            $observations[] = $this->skorTbcAnak;
        }
        if ($this->hasilUjiTuberkulin->getValue()) {
            $observations[] = $this->hasilUjiTuberkulin;
        }
        if ($this->klasifikasiHasilKepekaan->getValue()) {
            $observations[] = $this->klasifikasiHasilKepekaan;
        }
        if (!empty($observations)) {
            $this->data->setObservation($observations);
        }
        if ($this->pemeriksaanTuberkulin->getTypeCode()) {
            $this->data->setProcedure([$this->pemeriksaanTuberkulin]);
        }
        if ($this->suspect->getImunisasiBcgId()) {
            $this->setTbSuspect($this->suspect);
        }
        if ($this->konfirmasi->getAsalRujukanId()) {
            $this->data->setTbConfirm($this->konfirmasi);
        }
        if ($this->episodeOfCare->getStatus()) {
            $this->data->setEpisodeOfCare($this->episodeOfCare);
        }

        return $this;
    }
}