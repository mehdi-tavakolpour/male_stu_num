<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;



class Test extends TestCase
{

 	/**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

    public function setUp()
    {
        $host = 'http://localhost:4444/wd/hub'; // this is the default
        $this->webDriver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
    }


     public function tearDown()
    {
        $this->webDriver->close();
    }


    protected $url = '*****';

    public function testMehr(){

    	$this->webDriver->get($this->url);
    	$this->webDriver->manage()->window()->maximize();

    	$this->webDriver->get($this->url .'login');

    	$this->webDriver->findElement(WebDriverBy::id('username'))->sendKeys('****');
    	$this->webDriver->findElement(WebDriverBy::id('password'))->sendKeys('****');

    	$this->webDriver->findElement(WebDriverBy::xpath('//button[@type="submit"]'))->click();

    	$this->webDriver->get($this->url .'user');

    	$this->webDriver->findElement(WebDriverBy::xpath('//button[@class="btn toggle-filterBox"]'))->click();

    	$this->webDriver->findElement(WebDriverBy::className('select2-selection__rendered'))->click();

    	$this->webDriver->findElement(WebDriverBy::xpath("//*[@class='select2-results__options']/li[2]"))->click();
    	$this->webDriver->findElement(WebDriverBy::xpath("//*[@id='tab-personal']/div[4]/div/span"))->click();
    	$this->webDriver->findElement(WebDriverBy::xpath('//li[@class="select2-results__option select2-results__option--highlighted"]'))->click();
    	$this->webDriver->findElement(WebDriverBy::xpath('//button[@type="submit"]'))->click();

    	$pageSource = $this->webDriver->getPageSource();

    	echo "\n**************************\n";
    	echo 'men student numbers: ' . (substr_count($pageSource,'<tr>')-2);
    	echo "\n**************************";
    	



    }

}
