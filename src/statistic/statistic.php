<?php namespace Statistic;

class Statistic
{
	//deklarasi variabel
	private $data;
	private $length;
	private $indexMedian;
	private $median;
	private $average;
	private $isOdd;
	public $validated;

	public function __construct($Data)
	{
		if($this->validate($Data))
		{
			$this->validated = $this->validate($Data); //validasi datanya
			$this->data = $this->radixSort($Data); //jalankan sortir kemudian simpan data
			$this->isOdd = (count($Data)%2 == 0) ? false : true; //cek genap atau ganjil
		}
	}

	public function getData()
	{
		return $this->data; //kembalikan data yang telah di sortir
	}

	public function validate($Data)
	{
		if(!is_array($Data))
		{
			$this->data = NULL; //klo bukan array harusnya data jadi NULL
			return FALSE; //kemudian return false
		}

		if(count($Data)<1)
		{
			return FALSE; //klo data kurang dari 1 juga return false
		}
		else
		{
			foreach($Data as $data)
			{
				if(!is_numeric($data)) return FALSE; //klo data bukan angka juga return false
			}

			$this->length = count($Data); //klo angka semua set panjang datanya berapa
			return TRUE; //kemudian return true
		}
	}

	public function getAverage()
	{
		if((!$this->validated)){ return false; } //klo validasi lolos

		$hasil = 0;
		foreach($this->data as $angka)
		{
			$hasil = $hasil+$angka; //tambahkan seluruh anggota array
		}
		return $this->average = $hasil/$this->length; //hasil tambah dibagi jumlah
	}

	public function getMedian()
	{
		if((!$this->validated)){ return false; } //klo validasi lolos

		$this->indexMedian = ceil($this->length/2); //hitung nilai tengah, dibulatkan keatas

		if($this->isOdd)
		{	
			//klo ganjil
			return $this->median = $this->data[$this->indexMedian-1];
		}
		else
		{
			//klo genap
			return $this->median = ($this->data[$this->indexMedian-1]+$this->data[$this->indexMedian])/2;
		}
	}

	//fungsi sorting nya nih
	public function radixSort($input)
	{
		$temp = $output = array();
		$len = count($input);

		for ($i = 0; $i < $len; $i++) {
			$temp[$input[$i]] = ($temp[$input[$i]] > 0) 
				? ++$temp[$input[$i]]
				: 1;
		}

		ksort($temp);

		foreach ($temp as $key => $val) {
			if ($val == 1) {
				$output[] = $key; 
			} else {
				while ($val--) {
					$output[] = $key;
				}
		    }
		}

		return $output;
	}
}