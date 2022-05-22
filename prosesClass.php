<?php
class proses {

function konversi_huruf($N) {
	/*
	* Fungsi untuk mengonversi nilai dari data yang telah di input yang akan dijadikan grade nilai
	* input : nilai total (int)
	* ouput : grade (String / Varchar)
	*/
	if ($N >= "86") {
		$grade = "A";
	} else if ($N>="81"&&$N<"86"){
		$grade = "A-";
	} else if ($N>="76"&& $N < "81") {
		$grade = "B+";
	} else if ($N>="71"&& $N < "76" ) {
		$grade = "B";
	} else if ($N>="66"&& $N < "71") {
		$grade = "B-";
	} else if ($N>="61"&& $N < "66" ) {
		$grade = "C+";
	} else if ($N>="56"&& $N < "61" ) {
		$grade = "C";
	} else if ($N>="51"&& $N < "56" ) {
		$grade = "C-";
	} else if ($N>="46"&& $N < "51" ) {
		$grade = "D";
	} else if ($N < "46"){		
		$grade = "E";
	}	
	return $grade;
}

function konversi_ip($N) {
	/*
	* Fungsi untuk mengonversi nilai dari data yang telah di input yang akan dijadikan grade nilai
	* input : nilai total (int)
	* ouput : grade (String / Varchar)
	*/
	if ($N >= "86") {
		$grade = "4";
	} else if ($N>="81"&&$N<"86"){
		$grade = "3.7";
	} else if ($N>="76"&& $N < "81") {
		$grade = "3.3";
	} else if ($N>="71"&& $N < "76" ) {
		$grade = "3";
	} else if ($N>="66"&& $N < "71") {
		$grade = "2.7";
	} else if ($N>="61"&& $N < "66" ) {
		$grade = "2.3";
	} else if ($N>="56"&& $N < "61" ) {
		$grade = "2";
	} else if ($N>="51"&& $N < "56" ) {
		$grade = "1.7";
	} else if ($N>="46"&& $N < "51" ) {
		$grade = "1";
	} else if ($N < "46"){				
		$grade = "0";
	}	
	return $grade;
}

}
?>