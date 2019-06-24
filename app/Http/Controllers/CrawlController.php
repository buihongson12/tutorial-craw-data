<?php

namespace App\Http\Controllers;

use App\Crawl;
use App\NgoaiTe;

use Illuminate\Http\Request;


class CrawlController extends Controller
{
    public function getDataVCB(){
    	require(app_path() . "\Include\simple_html_dom.php");
		$html = file_get_html("https://www.vietcombank.com.vn/exchangerates/");
		
		$ngoaite = $html->find("tr.odd td");

		$strNgoaiTe = "";
		foreach ($ngoaite as $nt) {

			$strNgoaiTe .= $nt->innertext . " ";

		}

		// dd($strNgoaiTe);
		$arrNgoaiTe = explode(" ", $strNgoaiTe);

		for ($i=0; $i < count($strNgoaiTe) ; $i++) { 
			$arrNgoaiTe[$i] = str_replace("  "," ",$strNgoaiTe);
		}
		
		dd($arrNgoaiTe);

		// return view('admin.crawldata', compact($ngoaite));
		// return view('admin.crawldata', ['ngoaite' => $ngoaite]);
	}

	public function getDataVCB2(){
		require(app_path() . "\Include\simple_html_dom.php");
		$html = file_get_html("https://www.vietcombank.com.vn/exchangerates/");
		
		// foreach ($html->find("tr.odd td") as $cronnt) {
		// 	// $arrTemp = [];
		// 	echo "<pre>";
		// 	var_dump($cronnt);
		// 	echo "</pre>";
		// }
		echo "<pre>";
		var_dump($html->find("tr.odd td"));
		echo "</pre>";

		// dd($cronnt);
		// echo $html->load($html->save());


	}

	public function getDom($link){
		$ch = curl_init($link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// Khi thực thi lệnh sẽ k view ra trình duyệt mà lưu lại vào 1 biến kiểu string
        $content = curl_exec($ch);
        curl_close($ch);
        $dom = str_get_html($content);

        return $dom;
	}

	public function saveDB(){

	}

}
