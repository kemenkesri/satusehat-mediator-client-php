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

    /** @var Observation */
    protected $imunisasiBcg;

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
    }

    protected function mustValidated()
    {
        return [
            'TbConfirm',
            'EpisodeOfCare',
        ];
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

        return $this;
    }

    public function build()
    {
        parent::build();

        return $this;
    }
}