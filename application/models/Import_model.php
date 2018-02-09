<?php
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_model extends CI_Model {

    protected $table_master = 'data_master';
    protected $table_tagihan = 'data_tagihan';
    protected $primary_key = 'id';

    public function upload_data_master($filename_master)
    {
        ini_set('memory_limit', '-1');
        $inputFileNameMaster = './upload/'.$filename_master;
        try {
        $objMaster = PHPExcel_IOFactory::load($inputFileNameMaster);
        } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
        }

        $worksheet_master = $objMaster->getActiveSheet()->toArray(null,true,true,true);
        $numRowsMaster = count($worksheet_master);

        //looping data master
        for ($i=2; $i < ($numRowsMaster+1) ; $i++) { 

                $ins_master = array(
                        "idpel"          => $worksheet_master[$i]["B"],
                        "nama"         => $worksheet_master[$i]["C"],
                        "tarif"          => $worksheet_master[$i]["D"],
                        "daya"          => $worksheet_master[$i]["E"],
                        "alamat"          => $worksheet_master[$i]["F"],
                        "koduk_lama"          => $worksheet_master[$i]["G"],
                        "koduk_baru"          => $worksheet_master[$i]["H"],
                        "desa"          => $worksheet_master[$i]["I"],
                        "ptgs"          => $worksheet_master[$i]["J"],
                        "daerah"          => $worksheet_master[$i]["K"],
                        "lbr"          => $worksheet_master[$i]["L"],
                        "rptag"          => $worksheet_master[$i]["M"],
                        "rpbk"          => $worksheet_master[$i]["N"],
                        "tot"          => $worksheet_master[$i]["O"],
                        "tanggal_input"   => date('Y-m-d'),
                        "user_id"   => $this->session->userdata('user_id'),
                       );

                $this->db->insert('data_master', $ins_master);
            } 

    }
    public function upload_data_tagihan($filename_tagihan)
    {
        ini_set('memory_limit', '-1');

        $inputFileNameTagihan = './upload/'.$filename_tagihan;
        try {
        $objTagihan = PHPExcel_IOFactory::load($inputFileNameTagihan);
        } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
        }

        
        $worksheet_tagihan = $objTagihan->getActiveSheet()->toArray(null,true,true,true);
        $numRowsTagihan = count($worksheet_tagihan);

        //looping data tagihan
        
        for ($i=2; $i < ($numRowsTagihan+1) ; $i++) { 

                $ins_tagihan = array(
                        "unitap"          => $worksheet_tagihan[$i]["A"],
                        "unitup"         => $worksheet_tagihan[$i]["B"],
                        "idpel"          => $worksheet_tagihan[$i]["C"],
                        "nama"          => $worksheet_tagihan[$i]["D"],
                        "tarif"          => $worksheet_tagihan[$i]["E"],
                        "daya"          => $worksheet_tagihan[$i]["F"],
                        "kogol"          => $worksheet_tagihan[$i]["G"],
                        "gardu"          => $worksheet_tagihan[$i]["H"],
                        "alamat"          => $worksheet_tagihan[$i]["I"],
                        "lembar"          => $worksheet_tagihan[$i]["J"],
                        "rptag"          => $worksheet_tagihan[$i]["K"],
                        "rpbk"          => $worksheet_tagihan[$i]["L"],
                        "tanggal_input"   => date('Y-m-d'),
                        "user_id"   => $this->session->userdata('user_id'),
                       );

                $this->db->insert('data_tagihan', $ins_tagihan);
            } 
    }

    public function filterTagihanBelumBayar()//iki kudune wes bayar
    {
    
        $this->db->select('dm.idpel,dm.daerah,dm.ptgs, SUM(dm.rptag) as rp_tagihan');
            $this->db->from('data_master as dm');
            $this->db->join('data_tagihan as dt', 'dt.idpel = dm.idpel','left');
            $this->db->group_by('dm.ptgs');
            $this->db->order_by('dm.daerah','ASC');

            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        
    }

    public function filterPelangganBelumBayar()
   {
   
       $this->db->select('dm.idpel, dm.nama, dm.alamat, dm.ptgs, SUM(dm.rptag) as rptag');
           $this->db->from('data_master as dm');
           $this->db->join('data_tagihan as dt', 'dt.idpel != dm.idpel','left');
           $this->db->group_by('dm.ptgs');
           $this->db->order_by('dm.daerah','ASC');

           $query = $this->db->get();
           
           if ($query->num_rows() > 0) {
               return $query->result();
           }
   }
    
    public function filterHasil()
    {
    
        $this->db->select('dm.idpel,dm.daerah,dm.ptgs, SUM(dm.rptag) as saldo_awal, SUM(dt.rptag) as h_akhir, (sum(dm.rptag)-sum(dt.rptag)) as saldo_akhir');
            $this->db->from('data_master as dm');
            $this->db->join('data_tagihan as dt', 'dt.idpel = dm.idpel','left');
            $this->db->group_by('dm.ptgs');
            $this->db->order_by('dm.daerah','ASC');

            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        
    }

    public function kosongi()
    {
        $this->db->empty_table('data_master');
        $this->db->empty_table('data_tagihan');
    }
}
