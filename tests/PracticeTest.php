<?php
class PracticeTest extends PHPUnit_Framework_TestCase
{
	
	public function testReturnTrueIfParameterOfDataTypeArray()
	{
		//data yang diberikan
		$data = [1,3,7,15,2,5,10];

		//eksekusi scriptnya
		//buat instance baru dari objek statistik dengan data 
		//yang diberikan tadi
		$test = new \Statistic\Statistic($data);

		//nyatakan bahwa data yang diberikan bertipe array
		$this->assertInternalType('array', $test->getData()); // true
	}

	public function testReturnNullIfDataTypeNotArray()
	{
		//data yang diberikan
		$data = 15;

		//eksekusi scriptnya
		//buat instance baru dari objek statistik
		$test = new \Statistic\Statistic($data);

		//nyatakan bahwa aplikasi
		//akan mengembalian nilai NULL
		//jika data yang diberikan tidak bertipe array
		$this->assertEquals(NULL, $test->getData()); // true
		$this->assertEquals(NULL, $test->getMedian()); // true
		$this->assertEquals(NULL, $test->getAverage()); // true
	}

	public function testReturnNullIfDataLengthLessThenOne()
	{
		$data = 0;

		//eksekusi scriptnya
		//buat instance baru dari objek statistik
		$test = new \Statistic\Statistic($data);

		//nyatakan bahwa setiap metode atau fungsi
		//akan menghasilkan NULL jika panjang data
		//kurang dari satu
		$this->assertEquals(NULL, $test->getData()); // true
		$this->assertEquals(NULL, $test->getMedian()); // true
		$this->assertEquals(NULL, $test->getAverage()); // true
	}

	public function testReturnTrueIfArrayContainNumber()
	{
		//berikan data
		$data = [1,3,5,7,10];
		$data2 = [1,a,15,20];

		//inisiasi objek
		$test = new \Statistic\Statistic($data);
		$test2 = new \Statistic\Statistic($data2);

		//asersi pertama ini harusnya menghasilkan true
		//karena data yang diberikan semuanya angka
		$this->assertEquals(TRUE, $test->validated); // true
		//asersi kedua ini harusnya menghasilkan false
		//karena data yang diberikan memiliki huruf
		$this->assertEquals(FALSE, $test2->validated); // true

	}

	public function testRadixSortingInAscendingOrder()
	{
		//data yang diberikan
		$data = array(1,3,7,15,2,4);
		//actual
		$test = new \Statistic\Statistic($data);
		$actual = $test->radixSort($data);
		//expected
		$expected = array(1,2,3,4,7,15);

		
		$this->assertEquals($expected,$actual); //true
	}

	public function testGettingCorrectAverage()
	{
		//data yang diberikan
		$data = array(8,8,8,8);
		$data2 = array(8,7,9,10);

		//hasil yang diharapkan
		$expected = 8; //dah jelas harusnya rata2 nya 8
		$expected2 = 8.5; // berdasar rumus rata2 (34/2 = 8.5)

		//assert
		$test = new \Statistic\Statistic($data);
		$test2 = new \Statistic\Statistic($data2);
		$this->assertEquals($expected,$test->getAverage());
		$this->assertEquals($expected2,$test2->getAverage());
	}

	public function testGettingCorrectMedianForOddNumber()
	{
		//data yang diberikan
		$data = array(1,3,5,7,10);

		//hasil yang diharapkan
		$expected = 5;

		//assert
		$test = new \Statistic\Statistic($data);
		$this->assertEquals($expected,$test->getMedian());
	}

	public function testGettingCorrectMedianForEvenNumber()
	{
		//data yang diberikan
		$data = array(1,3,5,7,10,15);

		//hasil yang diharapkan ((5+7)/2 = 6)
		$expected = 6;

		//assert
		$test = new \Statistic\Statistic($data);
		$this->assertEquals($expected,$test->getMedian());
	}

}