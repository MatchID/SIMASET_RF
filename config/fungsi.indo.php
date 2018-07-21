<?php

	//tgl_indo(date("Y m d"));
	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = bln_indo(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	//bln_indo(date("m"));
	function bln_indo($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
	} 
	
	//$rupiah = "999999999";
	//echo terbilang_rp_indo($rupiah)." Rupiah";
	function terbilang_rp_indo($satuan){
		$huruf = array("", "Satu ", "Dua ", "Tiga ", "Empat ", "Lima ", "Enam ", "Tujuh ", "Delapan ", "Sembilan ", "Sepuluh ", "Sebelas ");
		
		if($satuan < 12 )
			return " " . $huruf[$satuan];
		elseif ($satuan < 20)
			return terbilang_rp_indo($satuan - 10) . " Belas";
		elseif ($satuan < 100)
			return terbilang_rp_indo($satuan / 10) . " Puluh" . terbilang_rp_indo($satuan % 10);
		elseif ($satuan < 200 )
			return " Seratus " . terbilang_rp_indo($satuan - 100);
		elseif ($satuan < 1000)
			return terbilang_rp_indo($satuan / 100) . " Ratus" . terbilang_rp_indo($satuan % 100);
		elseif ($satuan < 2000)
			return " Seribu " . terbilang_rp_indo($satuan - 1000);
		elseif ($satuan < 1000000)
			return terbilang_rp_indo($satuan / 1000) . " Ribu" . terbilang_rp_indo($satuan % 1000);
		elseif ($satuan < 1000000000)
			return terbilang_rp_indo($satuan / 1000000) . " Juta" . terbilang_rp_indo($satuan % 1000000);
		elseif ($satuan <= 10000000000)
			echo "Data Uang Terlalu Besar";		
	}
?>
