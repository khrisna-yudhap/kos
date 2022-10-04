<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertMysqlDate')) {
    
    /**
     * Convert Indonesian type of date format into sql format
     * 
     * @param String  $date
     * @return String
     */
    function convertMysqlDate($date) {
        $date = str_replace('/', '-', $date);
        $result = $date;
        if(!empty($date)) {
            $arr = explode('-', $date);
            if(checkdate($arr[1], $arr[0], $arr[2])) {
                $result = "$arr[2]-$arr[1]-$arr[0]";
            }
        }
        return $result;
    }
}    

if (!function_exists('convertMysqlDateTime')) {
    
    /**
     * Convert Indonesian type of datetime format into sql format
     * 
     * @param String  $datetime
     * @return String
     */
    function convertMysqlDateTime($datetime) {
        $datetime = str_replace('/', '-', $datetime);
        $result = $datetime;
        if(!empty($datetime)) {
            $arr = explode('-', $datetime);
            $year = substr($arr[2], 0, 4);
            $time = substr($arr[2], -5);
            if(checkdate($arr[1], $arr[0], $year)) {
                $result = "$year-$arr[1]-$arr[0] $time";
            }
        }
        return $result;
    }
}

if (!function_exists('ConvertDate')) {
    
    function ConvertDate($StrDate, $StrFormat, $ResultFormat) {
        /*
         * 	Fungsi untuk menconvert format Tanggal
         */
        $StrFormat = strtoupper($StrFormat);
        switch ($StrFormat) {
            case "MM/DD/YYYY" : list($Month, $Day, $Year) = explode("/", $StrDate);
                break;
            case "DD/MM/YYYY" : list($Day, $Month, $Year) = explode("/", $StrDate);
                break;
            case "YYYY/MM/DD" : list($Year, $Month, $Day) = explode("/", $StrDate);
                break;
            case "MM-DD-YYYY" : list($Month, $Day, $Year) = explode("-", $StrDate);
                break;
            case "DD-MM-YYYY" : list($Day, $Month, $Year) = explode("-", $StrDate);
                break;
            case "YYYY-MM-DD" : list($Year, $Month, $Day) = explode("-", $StrDate);
                break;
        }//End switch
        $ResultFormat = strtoupper($ResultFormat);
        switch ($ResultFormat) {
            case "MM-DD-YYYY" : $StrResult = $Month . "-" . $Day . "-" . $Year;
                break;
            case "DD-MM-YYYY" : $StrResult = $Day . "-" . $Month . "-" . $Year;
                break;
            case "YYYY-MM-DD" : $StrResult = $Year . "-" . $Month . "-" . $Day;
                break;
            case "MM/DD/YYYY" : $StrResult = $Month . "/" . $Day . "/" . $Year;
                break;
            case "DD/MM/YYYY" : $StrResult = $Day . "/" . $Month . "/" . $Year;
                break;
            case "YYYY/MM/DD" : $StrResult = $Year . "/" . $Month . "/" . $Day;
                break;
        }//End switch
        return $StrResult;
    }
	function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}

function tanggal_indo2($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[2];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}

}

/*
 * End of file : tanggal_helper.php
 * File location : ./application/helper/tanggal_helper.php
 */
